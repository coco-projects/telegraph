<?php

    declare(strict_types = 1);

    namespace Coco\telegraph\entities;

class PageList extends BaseEntities
{
    public int   $total_count = 0;
    public array $pages       = [];

    public function toArray(): array
    {
        return [
            'total_count' => $this->total_count,
            'pages'       => (function () {
                $arr = [];

                foreach ($this->pages as $k => $page) {
                    $arr[] = $page->toArray();
                }

                return $arr;
            })(),
        ];
    }
}
