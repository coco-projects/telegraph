<?php

    require '../vendor/autoload.php';

    \Coco\telegraph\Telegraph::setProxy('192.168.0.111', 1080);
    \Coco\telegraph\Telegraph::setProxyEnable(true);
    \Coco\telegraph\Telegraph::setDebug(!true);

    $telegraph = new \Coco\telegraph\Telegraph('cf66a21dab90cd6bcd8c505f88a15911a1cd1ae76d6d018d26a096bcf05e');

    print_r($telegraph->account()->initAccount());

    $res = $telegraph->page()->getViews('newnew-07-24',2025);

    print_r($res->toArray());;;


