<?php

    require '../vendor/autoload.php';

    \Coco\telegraph\Telegraph::setProxy('192.168.0.111', 1080);
    \Coco\telegraph\Telegraph::setProxyEnable(true);
    \Coco\telegraph\Telegraph::setDebug(!true);

    $telegraph = new \Coco\telegraph\Telegraph('245d8a8b7f0fe16b19137559665da6cff61985c26b83a1a23e21e8dd401e');

    print_r($telegraph->account()->initAccount());
//    print_r($telegraph->account()->revokeAccessToken());







