<?php

    use Coco\telegraph\dom\E;
    use Coco\telegraph\Telegraph;

    require '../vendor/autoload.php';

    Telegraph::setProxy('192.168.0.111', 1080);
    Telegraph::setProxyEnable(true);
    Telegraph::setDebug(!true);

    $telegraph = new Telegraph('cf66a21dab90cd6bcd8c505f88a15911a1cd1ae76d6d018d26a096bcf05e');

    $telegraphImg1   = 'https://telegra.ph/file/1310a205f732f9bae8141.jpg';
    $telegraphImg2   = 'https://telegra.ph/file/10bb4bf90be7fd67cad77.jpg';
    $telegraphImg3   = 'https://telegra.ph/file/5cd2083b75dc86a624eed.jpg';
    $telegraphImg4   = 'https://telegra.ph/file/695ef88e7da5f05d76a33.jpg';
    $telegraphvideo1 = 'https://telegra.ph/file/6522c3c39190ee4c772ee.mp4';
    $telegraphvideo2 = 'https://telegra.ph/file/df0cb8a21dc2022a40bfe.mp4';

    $telegraphAudio1 = 'https://webfs.tx.kugou.com/202407241149/c4eb3ef1e32231d763159b071da75352/v3/44226fcc3e842fb94684e80b0449505f/yp/p_0_960175/ap1014_us0_mif68d61cbb99e1ef8dec2c7fdc941cef4_pi406_mx106793394_s3602779325.mp3';

    $telegraphYoutube = 'https://www.youtube.com/watch?v=FzG4uDgje3M';
    $telegraphVimeo   = 'https://vimeo.com/340057344';
    $telegraphTwitter = 'https://twitter.com/SaeedDiCaprio/status/1648865166191206400';
    $code             = file_get_contents(__FILE__);

    $contents = E::container(123123);
    $contents = E::NodeRenderToApi($contents);

    /*
        $contents = [
            [
                'tag'      => 'p',
                'attrs'    => [],
                'children' => ['hello edited'],
            ],
        ];
    */

    $res = $telegraph->page()->editPage('newnew-07-24', 'newnew123456', $contents, 'auth', 'https://baidu.com');

    print_r($res->toArray());;;


