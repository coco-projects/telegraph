<?php

    require '../vendor/autoload.php';

    \Coco\telegraph\Telegraph::setProxy('192.168.0.111', 1080);
    \Coco\telegraph\Telegraph::setProxyEnable(true);
    \Coco\telegraph\Telegraph::setDebug(true);

    // cf66a21dab90cd6bcd8c505f88a15911a1cd1ae76d6d018d26a096bcf05e
    // e9312445d48e8b41b29211e11b0b509657b204a6d3fed342200098271428

//    $telegraph = new \Coco\telegraph\Telegraph('cf66a21dab90cd6bcd8c505f88a15911a1cd1ae76d6d018d26a096bcf05e');
    $telegraph = new \Coco\telegraph\Telegraph();

    print_r($telegraph->account()->initAccount());







