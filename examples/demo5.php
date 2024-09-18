<?php

    use Coco\telegraph\Telegraph;

    require '../vendor/autoload.php';

    Telegraph::setProxy('192.168.0.111', 1080);
    Telegraph::setProxyEnable(true);
    Telegraph::setDebug(!true);

    $telegraph = new Telegraph('245d8a8b7f0fe16b19137559665da6cff61985c26b83a1a23e21e8dd401e');

    print_r($telegraph->account()->initAccount());
//    print_r($telegraph->account()->revokeAccessToken());







