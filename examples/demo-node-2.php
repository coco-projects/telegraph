<?php

    use Coco\telegraph\dom\E;
    use Coco\telegraph\Telegraph;

    require '../vendor/autoload.php';

    $doms = [

        E::hr(),

        E::splitLine(),
        E::h3('《这是h3这是h3这是h3》'),

        E::splitLine(),
        E::h4('《这是h4这是h4这是h4》'),

        E::splitLine(),
        E::p([
            E::span('《p 中的 span标签》'),
            'p 中的普通字符',
            ' ',
            E::a('https://www.baidu.com', '普通a标签 baidu.com'),
            E::a1('https://www.baidu.com', '普通a1标签 baidu.com'),
        ]),

    ];

    echo E::toJson(E::container($doms), true);