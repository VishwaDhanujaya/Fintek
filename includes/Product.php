<?php
// includes/Product.php

/**
 * Represents a single product with all its specifications.
 *
 * Specs are stored as a nested associative array:
 *   [ 'Tab Group Name' => [ 'Spec Key' => 'Spec Value', ... ], ... ]
 */
class Product
{
    private string $id;
    private string $name;
    private string $categoryId;
    private string $price;
    private string $image;
    private string $shortDesc;
    private bool   $isNew;
    private ?string $brochure;
    private array  $specs;

    public function __construct(
        string $id,
        string $name,
        string $categoryId,
        string $price,
        string $image,
        string $shortDesc,
        bool   $isNew  = false,
        ?string $brochure = null,
        array  $specs  = []
    ) {
        $this->id         = $id;
        $this->name       = $name;
        $this->categoryId = $categoryId;
        $this->price      = $price;
        $this->image      = $image;
        $this->shortDesc  = $shortDesc;
        $this->isNew      = $isNew;
        $this->brochure   = $brochure;
        $this->specs      = $specs;
    }

    // -------------------------------------------------------------------------
    // Getters
    // -------------------------------------------------------------------------

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategoryId(): string
    {
        return $this->categoryId;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getShortDesc(): string
    {
        return $this->shortDesc;
    }

    public function isNew(): bool
    {
        return $this->isNew;
    }

    public function getBrochure(): ?string
    {
        return $this->brochure;
    }

    /**
     * Returns all spec groups: [ 'General' => [...], 'Copier' => [...], ... ]
     */
    public function getSpecs(): array
    {
        return $this->specs;
    }

    /**
     * Returns the names of all spec tabs (e.g. ['General', 'Copier', 'Scanner']).
     */
    public function getSpecGroupNames(): array
    {
        return array_keys($this->specs);
    }

    /**
     * Returns a single spec group by name, or an empty array if not found.
     */
    public function getSpecGroup(string $groupName): array
    {
        return $this->specs[$groupName] ?? [];
    }

    /**
     * Returns true if this product has any spec data.
     */
    public function hasSpecs(): bool
    {
        return !empty($this->specs);
    }

    /**
     * Generates a URL-safe tab ID from a spec group name.
     * e.g. "Facsimile (opt.)" → "facsimile-opt"
     */
    public function getTabId(string $groupName): string
    {
        return strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $groupName));
    }
}
