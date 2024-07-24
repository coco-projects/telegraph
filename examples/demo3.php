<?php

    require '../vendor/autoload.php';

    \Coco\telegraph\Telegraph::setProxy('192.168.0.111', 1080);
    \Coco\telegraph\Telegraph::setProxyEnable(true);
    \Coco\telegraph\Telegraph::setDebug(true);

    // cf66a21dab90cd6bcd8c505f88a15911a1cd1ae76d6d018d26a096bcf05e

    $telegraph = new \Coco\telegraph\Telegraph('cf66a21dab90cd6bcd8c505f88a15911a1cd1ae76d6d018d26a096bcf05e');

    $res = $telegraph->account()->editAccountInfo('theWangWang2', 'thePublicWangWang11122', 'https://www.sina.com');

    print_r($res->toArray());
    print_r($telegraph->account()->currentAccountInfo());







