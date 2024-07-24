<?php

    declare(strict_types = 1);

    namespace Coco\telegraph\services;

    use Coco\telegraph\entities\Page;
    use Coco\telegraph\entities\PageList;
    use Coco\telegraph\entities\PageViews;

class PageService extends BaseService
{
    public function createPage(string $title, $content, ?string $authorName = null, ?string $authorUrl = null): Page
    {
        $data = array_filter([
            'title'          => $title,
            'author_name'    => $authorName,
            'author_url'     => $authorUrl,
            'content'        => $content,
            'return_content' => true,
        ]);

        return new Page($this->manager->handleRequest('/createPage', $data));
    }

    public function editPage(string $path, string $title, array $content, ?string $authorName = null, ?string $authorUrl = null): Page
    {
        $data = array_filter([
            'path'        => $path,
            'title'       => $title,
            'author_name' => $authorName,
            'author_url'  => $authorUrl,
            'content'     => $content,
        ]);

        return new Page($this->manager->handleRequest('/editPage', $data));
    }

    public function getPage(string $path): Page
    {
        $data = array_filter([
            'path'           => $path,
            'return_content' => true,
        ]);

        return new Page($this->manager->handleRequest('/getPage', $data));
    }

    public function getPageList(int $offset = 0, int $limit = 50): PageList
    {
        $data = array_filter([
            'offset' => $offset,
            'limit'  => $limit,
        ]);

        $data = $this->manager->handleRequest('/getPageList', $data);

        $pages = [];

        foreach ($data['pages'] as $k => $v) {
            $pages[] = new Page($v);
        }

        return new PageList([
            "total_count" => $data['total_count'],
            "pages"       => $pages,
        ]);
    }

    public function getViews(string $path, int $year = null, int $month = null, int $day = null, int $hour = null): PageViews
    {
        $options = ['path' => $path];

        !is_null($year) && ($options['year'] = $year);
        !is_null($month) && ($options['month'] = $month);
        !is_null($day) && ($options['day'] = $day);
        !is_null($hour) && ($options['hour'] = $hour);

        $data = array_filter($options);

        return new PageViews($this->manager->handleRequest('/getPage', $data));
    }
}
