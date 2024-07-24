<?php

    declare(strict_types = 1);

    namespace Coco\telegraph\dom;

class DomNode
{
    private string $tagName;
    private array  $attributes = [];
    private array  $childNodes = [];

    public static function create(string $tagName): static
    {
        return new static($tagName);
    }

    private function __construct(string $tagName)
    {
        $this->tagName = $tagName;
    }

    public function getTagName(): string
    {
        return $this->tagName;
    }

    public function setAttributes(array $attributes): static
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function addAttribute(string $key, string $value): static
    {
        $this->attributes[$key] = $value;

        return $this;
    }

    public function addAttributes(array $attrs): static
    {
        foreach ($attrs as $k => $v) {
            $this->attributes[$k] = $v;
        }

        return $this;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function setChildNodes(array $childNodes): static
    {
        $this->childNodes = $childNodes;

        return $this;
    }

    public function addChildNode(string|DomNode|array $childNode): static
    {
        $this->childNodes[] = $childNode;

        return $this;
    }

    public function getChildNodes(): array
    {
        return $this->childNodes;
    }
}
