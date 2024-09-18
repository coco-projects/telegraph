<?php

    use Coco\telegraph\dom\E;
    use Coco\telegraph\Telegraph;

    require '../vendor/autoload.php';

    Telegraph::setProxy('192.168.0.111', 1080);
    Telegraph::setProxyEnable(true);
    Telegraph::setDebug(!true);

    $telegraph = new Telegraph('cf66a21dab90cd6bcd8c505f88a15911a1cd1ae76d6d018d26a096bcf05e');

    $telegraphImg1 = 'https://telegra.ph/file/1310a205f732f9bae8141.jpg';
    $telegraphImg2 = 'https://telegra.ph/file/10bb4bf90be7fd67cad77.jpg';
    $telegraphImg3 = 'https://telegra.ph/file/5cd2083b75dc86a624eed.jpg';
    $telegraphImg4 = 'https://telegra.ph/file/695ef88e7da5f05d76a33.jpg';

    $telegraphvideo1 = 'https://telegra.ph/file/6522c3c39190ee4c772ee.mp4';
    $telegraphvideo2 = 'https://telegra.ph/file/df0cb8a21dc2022a40bfe.mp4';

    $telegraphAudio1 = 'https://webfs.tx.kugou.com/202407241149/c4eb3ef1e32231d763159b071da75352/v3/44226fcc3e842fb94684e80b0449505f/yp/p_0_960175/ap1014_us0_mif68d61cbb99e1ef8dec2c7fdc941cef4_pi406_mx106793394_s3602779325.mp3';

    $telegraphYoutube = 'https://www.youtube.com/watch?v=FzG4uDgje3M';
    $telegraphVimeo   = 'https://vimeo.com/340057344';

    $telegraphTwitter = 'https://twitter.com/elonmusk/status/1815929451256979636';

    $code = file_get_contents('demo1.php');

    $contents = E::container([

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

        E::splitLine(),
        E::p('Use Private Packagist if you want to share private code as a Composer package with colleagues or customers without publishing it for everyone on Packagist.org. Private Packagist allows you to manage your own private Composer repository with per-user authentication, team management and integration in version control systems.'),

        E::splitLine(),
        E::p('如今，科技的魔力为我们开启了一扇通往过去的窗户。通过AI的巧妙结合，那些静止的影像重新焕发生机，让我们得以重返往昔，与记忆中的自己重逢。'),

        E::splitLine(),

        E::a('https://www.baidu.com'),
        E::br(),

        E::a('https://www.google.com', 'baidu.com 111'),
        E::br(),

        E::a1('https://www.sina.com'),
        E::br(),

        E::a1('https://www.douyin.com', 'douyin.com 111'),
        E::br(),

        E::splitLine(),
        E::span('hello-span'),
        E::br(),

        E::splitLine(),
        E::em('这是 ememem'),
        E::br(),

        E::splitLine(),
        E::i('这是 iiiiiii'),
        E::br(),

        E::splitLine(),
        E::s('这是 sssssss'),
        E::br(),

        E::splitLine(),
        E::u('这是 uuuuuuu'),
        E::br(),

        E::splitLine(),
        E::strong('这是 strong strong'),
        E::br(),

        E::splitLine(),
        E::aside([
            E::p([
                E::span('hello-aside-1  '),
                E::a('https://www.baidu.com', 'baidu.com'),
            ]),
            E::p([
                E::span('hello-aside-2  '),
                E::a('https://www.baidu.com', 'baidu.com'),
            ]),
        ]),

        E::splitLine(),
        E::aside([
            'Use Private Packagist if you want to share private code as a Composer package with colleagues or customers without publishing it for everyone on Packagist.org. Private Packagist allows you to manage your own private Composer repository with per-user authentication, team management and integration in version control systems.'
        ]),

        E::splitLine(),
        E::list([
            'list hello111',
            'list hello222',
            'list hello333',
        ]),

        E::splitLine(),
        E::list([
            E::span('list span hello111'),
            E::span('list span hello222'),
            E::span('list span hello333'),
        ]),

        E::splitLine(),
        E::list([
            E::strong(E::a('https://www.baidu.com')),
            E::strong(E::a('https://www.baidu.com')),
            E::strong(E::a('https://www.baidu.com')),
        ]),

        E::splitLine(),
        E::list([
            E::strong([
                'list 1: ',
                E::a('https://www.baidu.com'),
            ]),
            E::strong([
                'list 2: ',
                E::a('https://www.baidu.com'),
            ]),
            E::strong([
                'list 3: ',
                E::a('https://www.baidu.com'),
            ]),
        ]),

        E::splitLine(),
        E::list([
            E::strong(E::a('https://www.baidu.com', 'list baidu111.com')),
            E::strong(E::a('https://www.baidu.com', 'list baidu222.com')),
            E::strong(E::a('https://www.baidu.com', 'list baidu333.com')),
        ], true),

        E::splitLine(),
        E::blockquoteList([
            E::strong(E::a('https://www.baidu.com', 'blockquoteList baidu111.com')),
            E::strong(E::a('https://www.baidu.com', 'blockquoteList baidu222.com')),
            E::strong(E::a('https://www.baidu.com', 'blockquoteList baidu333.com')),
        ]),

        E::splitLine(),
        E::blockquoteList([
            E::strong(E::a('https://www.baidu.com', 'blockquoteList format 1 baidu111.com')),
            E::strong(E::a('https://www.baidu.com', 'blockquoteList format 1 baidu222.com')),
            E::strong(E::a('https://www.baidu.com', 'blockquoteList format 1 baidu333.com')),
        ], '__ID__. '),

        E::splitLine(),
        E::blockquoteList([
            E::strong(E::a('https://www.baidu.com', 'blockquoteList format 2 baidu111.com')),
            E::strong(E::a('https://www.baidu.com', 'blockquoteList format 2 baidu222.com')),
            E::strong(E::a('https://www.baidu.com', 'blockquoteList format 2 baidu333.com')),
        ], '__ID__> '),

        E::splitLine(),
        E::blockquoteList([
            '这个纲领性文件是如何诞生的',
            '马龙成奥运会5A级打卡点热',
            '沈腾一家出游被网友偶遇',
            '夏日经济 乘“热”而上',
        ], '__ID__. '),

        E::splitLine(),
        E::blockquoteList([
            E::strong([
                'AdminLTE：',
                E::a('https://github.com/almasaeed2010/AdminLTE'),
            ]),
            E::strong([
                'vue-Element-Admin：',
                E::a('https://github.com/PanJiaChen/vue-element-admin'),
            ]),
            E::strong([
                'tabler：',
                E::a('https://github.com/tabler/tabler'),
            ]),
        ], '__ID__. '),

        E::splitLine(),
        E::AList([
            $telegraphImg1,
            $telegraphImg2,
            $telegraphImg3,
            $telegraphImg4,
        ]),

        E::splitLine(),
        E::AList([
            $telegraphImg1,
            $telegraphImg2,
            $telegraphImg3,
            $telegraphImg4,
        ], true),

        E::br(),
        E::splitLine(),
        E::AListWithCaption1([
            [
                "href"    => $telegraphImg1,
                "caption" => "AListWithCaption1 1",
            ],
            [
                "href"    => $telegraphImg2,
                "caption" => "AListWithCaption1 2",
            ],
        ], true),

        E::br(),
        E::splitLine(),
        E::AListWithCaption2([
            [
                "href"    => $telegraphImg1,
                "caption" => "AListWithCaption2 1",
            ],
            [
                "href"    => $telegraphImg2,
                "caption" => "AListWithCaption2 2",
            ],
        ], true),

        E::br(),
        E::splitLine(),

        E::AListWithCaption3([
            [
                "href" => 'https://baidu.com',
            ],
            [
                "href" => 'https://google.com',
            ],
            [
                "href" => 'https://sina.com',
            ],
        ], '', false, '|'),

        E::br(),
        E::splitLine(),

        E::AListWithCaption3([
            [
                "href"    => 'https://baidu.com',
                "caption" => "AListWithCaption3 baidu",
            ],
            [
                "href"    => 'https://google.com',
                "caption" => "AListWithCaption3 google",
            ],
            [
                "href"    => 'https://sina.com',
                "caption" => "AListWithCaption3 sina",
            ],
        ]),

        E::br(),
        E::splitLine(),

        E::AListWithCaption3([
            [
                "href"    => 'https://baidu.com',
                "caption" => "AListWithCaption3 baidu",
            ],
            [
                "href"    => 'https://google.com',
                "caption" => "AListWithCaption3 google",
            ],
            [
                "href"    => 'https://sina.com',
                "caption" => "AListWithCaption3 sina",
            ],
        ], '《__CAPTION__》', true, '|'),

        E::br(),
        E::splitLine(),
        E::code('E::code' . PHP_EOL . $code),

        E::br(),
        E::splitLine(),
        E::pre('E::pre' . PHP_EOL . $code),

        E::br(),
        E::splitLine(),
        E::blockquote('E::blockquote' . PHP_EOL . $code),

        E::splitLine(),
        E::picture($telegraphImg1),


        E::splitLine(),
        E::picture($telegraphImg1, 'picture captain 0'),

        E::splitLine(),
        E::pictureList([
            $telegraphImg1,
            $telegraphImg2,
        ]),

        E::splitLine(),
        E::pictureListWithCaption([
            [
                "src"     => $telegraphImg3,
                "caption" => "picture captain 1",
            ],
            [
                "src"     => $telegraphImg4,
                "caption" => "picture captain 2",
            ],
        ]),

        E::splitLine(),
        E::video($telegraphvideo1, 'videos1'),

        E::splitLine(),
        E::video($telegraphvideo2),

        E::splitLine(),
        E::youtube($telegraphYoutube, 'youtube--'),

        E::splitLine(),
        E::vimeo($telegraphVimeo, 'vimeo--'),

        E::splitLine(),
        E::twitter($telegraphTwitter, 'twitter--'),

        E::splitLine('-'),
        E::splitLine('='),
        E::splitLine('%'),
        E::splitLine('#'),
        E::splitLine('$'),
        E::splitLine('*'),
        E::splitLine('!'),

    ]);

    $contents = E::NodeRenderToApi($contents);

    $res = $telegraph->page()->editPage('newnew-07-24', 'newnew123456', $contents, 'auth', 'https://baidu.com');

    print_r($res->toArray());;;


