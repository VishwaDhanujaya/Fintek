<?php
// includes/Category.php

/**
 * Represents a single product category.
 */
class Category
{
    private string $id;
    private string $name;
    private string $icon;
    private string $description;

    public function __construct(string $id, string $name, string $icon, string $description)
    {
        $this->id          = $id;
        $this->name        = $name;
        $this->icon        = $icon;
        $this->description = $description;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
