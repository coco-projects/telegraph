<?php

    declare(strict_types = 1);

    namespace Coco\telegraph\dom;

class E
{
    /*
         * ------------------------------------------------------
         *      基础方法
         * ------------------------------------------------------
     */
    public static function container(string|array|DomNode $text): DomNode
    {
        return self::createNode('body', $text);
    }

    public static function splitLine(string $s = '-', int $times = 120): DomNode
    {
        $map = [
            '-' => 120,
            '=' => 46,
            '%' => 44,
            '#' => 51,
            '$' => 68,
            '*' => 76,
            '!' => 113,
        ];

        $times_ = $map[$s] ?? $times;

        return self::p(self::span(str_repeat($s, $times_)));
    }

    public static function a(string $href, null|string|DomNode|array $text = null, array $attrs = []): DomNode
    {
        $text = $text ?? $href;

        return self::createNode('a', $text, array_merge(['href' => $href], $attrs));
    }

    public static function a1(string $href, null|string|DomNode|array $text = null, array $attrs = []): DomNode
    {
        $content = [];
        $text && $content[] = self::strong($text . ': ');

        $content[] = self::a($href);

        return self::span($content, $attrs);
    }

    public static function aside(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('aside', $text, $attrs);
    }

    public static function h3(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('h3', $text, $attrs);
    }

    public static function h4(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('h4', $text, $attrs);
    }

    public static function span(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('span', $text, $attrs);
    }

    public static function i(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('i', $text, $attrs);
    }

    public static function p(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('p', $text, $attrs);
    }

    public static function s(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('s', $text, $attrs);
    }

    public static function u(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('u', $text, $attrs);
    }

    public static function strong(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('strong', $text, $attrs);
    }

    public static function pre(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('pre', $text, $attrs);
    }

    public static function em(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('em', $text, $attrs);
    }

    public static function blockquote(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('blockquote', $text, $attrs);
    }

    public static function code(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('code', $text, $attrs);
    }

    public static function picture(string|DomNode|array $src, string $caption = '', array $attrs = []): DomNode
    {
        $figure = DomNode::create('figure');
        $figure->addAttributes($attrs);

        $imgNode = DomNode::create('img');
        $imgNode->addAttributes(['src' => $src]);

        $figure->addChildNode($imgNode);
        $figcaptionNode = DomNode::create('figcaption');
        $figcaptionNode->addChildNode($caption);
        $figure->addChildNode($figcaptionNode);

        return $figure;
    }

    public static function br(): DomNode
    {
        return self::createNode('br');
    }

    public static function hr(): DomNode
    {
        return self::createNode('hr');
    }

    protected static function ul(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('ul', $text, $attrs);
    }

    protected static function ol(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('ol', $text, $attrs);
    }

    protected static function li(string|DomNode|array $text, array $attrs = []): DomNode
    {
        return self::createNode('li', $text, $attrs);
    }

    /*
         * ------------------------------------------------------
         *      聚合方法
         * ------------------------------------------------------
     */

    public static function list(array $items = [], bool $ordered = false, array $attrs = []): DomNode
    {
        $tagName  = $ordered ? 'ol' : 'ul';
        $baseNode = DomNode::create($tagName);
        $baseNode->addAttributes($attrs);

        $itemsNode = array_map(fn($item) => self::li($item), $items);

        return $baseNode->setChildNodes($itemsNode);
    }

    public static function AList(array $items, bool $ordered = false, array $attrs = []): DomNode
    {
        $itemsNode = array_map(fn($item) => self::a($item), $items);

        return self::list($itemsNode, $ordered, $attrs);
    }

    public static function AListWithCaption1(array $items, bool $ordered = false, array $attrs = []): DomNode
    {
        $itemsNode = array_map(fn($item) => self::a($item['href'], $item['caption']), $items);

        return self::list($itemsNode, $ordered, $attrs);
    }

    public static function AListWithCaption2(array $items, bool $ordered = false, array $attrs = []): DomNode
    {
        $itemsNode = array_map(fn($item) => self::a1($item['href'], $item['caption']), $items);

        return self::list($itemsNode, $ordered, $attrs);
    }

    public static function AListWithCaption3(array $items, string $format = '__CAPTION__ ', bool $bold = false, string $split = '', array $attrs = []): DomNode
    {
        $itemsNode = [];
        $baseNode  = DomNode::create('span');
        $baseNode->addAttributes($attrs);

        foreach ($items as $item) {
            $caption = isset($item['caption']) ? strtr($format, ["__CAPTION__" => $item['caption']]) : $item['href'];

            if ($bold) {
                $caption = self::strong($caption);
            }

            $itemsNode[] = self::a($item['href'], $caption);

            if ($split) {
                $itemsNode[] = self::span(' ' . $split . ' ');
            } else {
                $itemsNode[] = '  ';
            }
        }

        // Remove the last separator
        array_pop($itemsNode);

        return $baseNode->setChildNodes($itemsNode);
    }

    public static function blockquoteList(array $items, string $format = '', array $attrs = []): DomNode
    {
        $itemsNode = [];
        $baseNode  = DomNode::create('div');
        $baseNode->addAttributes($attrs);

        foreach ($items as $k => $item) {
            $itemsNode[] = self::blockquote([
                self::strong(strtr($format, ["__ID__" => $k + 1])),
                $item,
            ]);
        }

        return $baseNode->addChildNode($itemsNode);
    }

    public static function pictureList(array $items, array $attrs = []): DomNode
    {
        $baseNode = DomNode::create('div');
        $baseNode->addAttributes($attrs);

        $itemsNode = array_map(fn($item) => self::picture($item), $items);

        return $baseNode->addChildNode($itemsNode);
    }

    public static function pictureListWithCaption(array $items, array $attrs = []): DomNode
    {
        $baseNode = DomNode::create('div');
        $baseNode->addAttributes($attrs);

        $itemsNode = array_map(fn($item) => self::picture($item['src'], $item['caption']), $items);

        return $baseNode->addChildNode($itemsNode);
    }

    public static function video(string $src, string|DomNode|array $caption = '', array $attrs = []): DomNode
    {
        $figure = DomNode::create('figure');
        $figure->addAttributes($attrs);

        $videoNode = DomNode::create('video');
        $videoNode->addAttributes(['src' => $src]);

        $figure->addChildNode($videoNode);
        $figcaptionNode = DomNode::create('figcaption');
        $figcaptionNode->addChildNode($caption);

        $videoNode->addAttributes(['title' => $caption]);
        $figure->addChildNode($figcaptionNode);

        return $figure;
    }

    public static function embed(string $name, string $url, string $caption = ''): DomNode
    {
        $figure = DomNode::create('figure');

        $url = '/embed/' . $name . '?url=' . rawurlencode($url);

        $iframeNode = self::iframe($url);
        $figure->addChildNode($iframeNode);

        $figcaptionNode = DomNode::create('figcaption');
        $figcaptionNode->addChildNode($caption);
        $figure->addChildNode($figcaptionNode);

        return $figure;
    }

    public static function youtube(string $url, string $caption = ''): DomNode
    {
        return self::embed('youtube', $url, $caption);
    }

    public static function vimeo(string $url, string $caption = ''): DomNode
    {
        return self::embed('vimeo', $url, $caption);
    }

    public static function twitter(string $url, string $caption = ''): DomNode
    {
        return self::embed('twitter', $url, $caption);
    }


    /*
         * ------------------------------------------------------
         * ------------------------------------------------------
     */
    private static function iframe(string $src, array $attrs = []): DomNode
    {
        return self::createNode('iframe', '', array_merge($attrs, ['src' => $src]));
    }

    public static function NodeRenderToApi(DomNode $contents): array
    {
        return [self::NodeRender($contents)];
    }

    public static function toJson(DomNode $contents, bool $isPretty = false): bool|string
    {
        $flags = $isPretty ? JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE : JSON_UNESCAPED_UNICODE;

        return json_encode([self::NodeRenderToApi($contents)], $flags);
    }

    private static function createNode(string $tag, string|DomNode|array $text = '', array $attrs = []): DomNode
    {
        $node = DomNode::create($tag);

        $text && $node->addChildNode($text);
        count($attrs) && $node->addAttributes($attrs);

        return $node;
    }

    private static function NodeRender(DomNode $contents): array
    {
        $array = [
            'tag'      => $contents->getTagName(),
            'attrs'    => $contents->getAttributes(),
            'children' => [],
        ];

        foreach ($contents->getChildNodes() as $childNode) {
            if (is_array($childNode)) {
                foreach ($childNode as $child) {
                    if (is_string($child)) {
                        $array['children'][] = $child;
                    }
                    if ($child instanceof DomNode) {
                        $array['children'][] = static::NodeRender($child);
                    }
                }
            } else {
                if (is_string($childNode)) {
                    $array['children'][] = $childNode;
                }
                if ($childNode instanceof DomNode) {
                    $array['children'][] = static::NodeRender($childNode);
                }
            }
        }

        return $array;
    }

    /*
                public static function audio(string $src, string $caption = '', array $attrs = []): DomNode
                {
                    $figure = DomNode::create('figure');
                    $figure->addAttributes($attrs);

                    $audioNode = DomNode::create('audio');
                    $audioNode->addAttributes(['src' => $src]);
                    $figure->addChildNode($audioNode);

                    $figcaptionNode = DomNode::create('figcaption');
                    $figcaptionNode->addChildNode($caption);

                    $audioNode->addAttributes(['title' => $caption]);
                    $figure->addChildNode($figcaptionNode);

                    return $figure;
                }


                public static function anchor(string|DomNode|array $text, string $anchorName, array $attrs = []): DomNode
                {
                    return self::a($text, '#' . $anchorName, $attrs);
                }

    */
}
