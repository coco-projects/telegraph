<?php

    declare(strict_types = 1);

    namespace Coco\telegraph\entities;

class Account extends BaseEntities
{
    public string $short_name   = '';
    public string $author_name  = '';
    public string $author_url   = '';
    public string $access_token = '';
    public string $auth_url     = '';
    public int    $page_count   = 0;

    public function toArray(): array
    {
        return [
            'short_name'   => $this->short_name,
            'author_name'  => $this->author_name,
            'author_url'   => $this->author_url,
            'access_token' => $this->access_token,
            'auth_url'     => $this->auth_url,
            'page_count'   => $this->page_count,
        ];
    }
}
