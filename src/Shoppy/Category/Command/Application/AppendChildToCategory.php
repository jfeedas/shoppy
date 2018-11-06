<?php

namespace Shoppy\Category\Command\Application;

use Shoppy\Category\Command\Application\Exception\CategoryNotFoundException;
use Shoppy\Category\Command\Repository\CategoryRepositoryInterface;
use Shoppy\Category\Command\Value\NewCategory;

/**
 * Class AppendChildToCategory
 * @package Shoppy\Category\Command\Application
 */
class AppendChildToCategory
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * AppendChildToCategory constructor.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param int $parentId
     * @param string $title
     *
     * @return int
     * @throws CategoryNotFoundException
     */
    public function append(int $parentId, string $title): int
    {
        $parent = $this->categoryRepository->getById($parentId);
        if ($parent === null) {
            throw new CategoryNotFoundException('Category id: ' . $parentId);
        }

        $newCategory = $parent->appendChild(new NewCategory($title));
        $this->categoryRepository->persist($newCategory);

        return $newCategory->id();
    }
}
