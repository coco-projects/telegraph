<?php

    use Coco\telegraph\Telegraph;

    require '../vendor/autoload.php';

    Telegraph::setProxy('192.168.0.111', 1080);
    Telegraph::setProxyEnable(true);
    Telegraph::setDebug(true);

    $telegraph = new Telegraph();

    $res = $telegraph->account()->createAccount('theWangWang', 'thePublicWangWang', 'https://www.baidu.com');

    print_r($res->toArray());

    print_r($telegraph->account()->currentAccountInfo());







