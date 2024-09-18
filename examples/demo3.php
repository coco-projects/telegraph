<?php

    use Coco\telegraph\Telegraph;

    require '../vendor/autoload.php';

    Telegraph::setProxy('192.168.0.111', 1080);
    Telegraph::setProxyEnable(true);
    Telegraph::setDebug(true);

    // cf66a21dab90cd6bcd8c505f88a15911a1cd1ae76d6d018d26a096bcf05e
    // bb79b2888a604580ec8b2ba073d932738eeca0c0c42c02ef2710f2c12f13

    $telegraph = new Telegraph('3a12c22a3f7cc4e25ba6e686f8afdd9dfe5b35a2eeb58cca971aec1ef616');

    $res = $telegraph->account()->editAccountInfo('theWangWang2', 'thePublicWangWang11122', 'https://www.sina.com');

    print_r($res->toArray());
    print_r($telegraph->account()->currentAccountInfo());







