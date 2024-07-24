<?php

    declare(strict_types = 1);

    namespace Coco\telegraph\entities;

class Page extends BaseEntities
{
    public string $path        = '';
    public string $url         = '';
    public string $title       = '';
    public string $description = '';
    public string $author_name = '';
    public string $author_url  = '';
    public string $image_url   = '';
    public array  $content     = [];
    public int    $views       = 0;
    public bool   $can_edit    = false;

    public function toArray(): array
    {
        return [
            'path'        => $this->path,
            'url'         => $this->url,
            'title'       => $this->title,
            'description' => $this->description,
            'author_name' => $this->author_name,
            'author_url'  => $this->author_url,
            'image_url'   => $this->image_url,
            'content'     => $this->content,
            'views'       => $this->views,
            'can_edit'    => $this->can_edit,
        ];
    }
}
