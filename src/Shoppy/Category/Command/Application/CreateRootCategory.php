<?php

namespace Shoppy\Category\Command\Application;

use Shoppy\Category\Command\Entity\CategoryInterface;
use Shoppy\Category\Command\Repository\CategoryRepositoryInterface;
use Shoppy\Category\Command\Value\NewCategory;

/**
 * Class CreateRootCategory
 * @package Shoppy\Category\Command\Application
 */
abstract class CreateRootCategory
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CreateRootCategory constructor.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param string $title
     *
     * @return int
     */
    public function create(string $title): int
    {
        $newCategory = $this->buildCategory(new NewCategory($title));
        $this->categoryRepository->persist($newCategory);

        return $newCategory->id();
    }

    /**
     * @param NewCategory $newCategory
     *
     * @return CategoryInterface
     */
    abstract protected function buildCategory(NewCategory $newCategory): CategoryInterface;
}
