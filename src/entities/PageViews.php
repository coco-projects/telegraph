<?php

    declare(strict_types = 1);

    namespace Coco\telegraph\entities;

class PageViews extends BaseEntities
{
    public int $views = 0;

    public function toArray(): array
    {
        return [
            'views' => $this->views,
        ];
    }
}
