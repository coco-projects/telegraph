<?php

    declare(strict_types = 1);

    namespace Coco\telegraph\services;

    use Coco\telegraph\entities\Account;

class AccountService extends BaseService
{
    private ?Account $currentAccount = null;

    public function initAccount(): Account
    {
        if ($this->manager->hasToken()) {
            $this->getAccountInfo();
        } else {
            $this->createAccount();
        }

        return $this->currentAccount;
    }

    public function createAccount(string $loginName = null, string $publicName = null, string $publicUrl = null): Account
    {
        $loginName = $loginName ?? uniqid('u', false);

        $data = array_filter([
            'short_name'  => $loginName,
            'author_name' => $publicName,
            'author_url'  => $publicUrl,
        ]);

        $account = new Account($this->manager->handleRequest('/createAccount', $data, false));

        $this->currentAccount = $account;
        $this->manager->setToken($account->access_token);

        return $account;
    }

    public function editAccountInfo(string $loginName = null, string $publicName = null, string $publicUrl = null): Account
    {
        $loginName = $loginName ?? uniqid('u', false);

        $data = array_filter([
            'short_name'  => $loginName,
            'author_name' => $publicName,
            'author_url'  => $publicUrl,
        ]);

        $account = new Account($this->manager->handleRequest('/editAccountInfo', $data));

        $account->access_token = $this->manager->getToken() ?? '';
        $this->currentAccount  = $account;

        return $account;
    }

    public function getAccountInfo(): Account
    {
        $account = new Account($this->manager->handleRequest('/getAccountInfo'));

        $account->access_token = $this->manager->getToken() ?? '';
        $this->currentAccount  = $account;

        return $account;
    }

    public function revokeAccessToken(): Account
    {
        $account = new Account($this->manager->handleRequest('/revokeAccessToken'));

        $this->currentAccount = $account;
        $this->manager->setToken($account->access_token);

        return $account;
    }

    public function currentAccountInfo(): ?Account
    {
        return $this->currentAccount;
    }
}
