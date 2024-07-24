<?php

    require '../vendor/autoload.php';

    \Coco\telegraph\Telegraph::setProxy('192.168.0.111', 1080);
    \Coco\telegraph\Telegraph::setProxyEnable(true);
    \Coco\telegraph\Telegraph::setDebug(true);

    $telegraph = new \Coco\telegraph\Telegraph();

    $res = $telegraph->account()->createAccount('theWangWang', 'thePublicWangWang', 'https://www.baidu.com');

    print_r($res->toArray());

    print_r($telegraph->account()->currentAccountInfo());







