<?php

    declare(strict_types = 1);

    namespace Coco\telegraph\services;

    use Coco\telegraph\entities\BaseEntities;
    use Coco\telegraph\Telegraph;

abstract class BaseService
{
    protected Telegraph     $manager;
    protected ?BaseEntities $entity;

    public function __construct(Telegraph $manager)
    {
        $this->manager = $manager;
    }
}
