<?php

namespace Shoppy\Category\Query\Application;

use Shoppy\Category\Query\Application\Exception\CategoryNotFoundException;
use Shoppy\Category\Query\Fetcher\CategoryChildrenFetcherInterface;
use Shoppy\Category\Query\Repository\CategoryRepositoryInterface;
use Shoppy\Category\Query\Value\CategoryInterface;

/**
 * Class GetChildrenOfCategory
 * @package Shoppy\Category\Query\Application
 */
class GetChildrenOfCategory
{
    /**
     * @var CategoryChildrenFetcherInterface
     */
    private $categoryChildrenFetcher;

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * GetChildrenOfCategory constructor.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     * @param CategoryChildrenFetcherInterface $categoryChildrenFetcher
     */
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        CategoryChildrenFetcherInterface $categoryChildrenFetcher
    ) {
        $this->categoryChildrenFetcher = $categoryChildrenFetcher;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param int $categoryId
     *
     * @return array|CategoryInterface[]
     * @throws CategoryNotFoundException
     */
    public function get(int $categoryId): array
    {
        $parent = $this->getParentId($categoryId);
        $childrenIds = $this->categoryChildrenFetcher->get($parent);

        return $this->categoryRepository->getByIds($childrenIds);
    }

    /**
     * @param int $categoryId
     *
     * @return int
     * @throws CategoryNotFoundException
     */
    private function getParentId(int $categoryId): int
    {
        if ($categoryId == 0) {
            return $categoryId;
        }

        $parent = $this->categoryRepository->getByIds([$categoryId]);
        if (empty($parent)) {
            throw new CategoryNotFoundException('Category id: ' . $categoryId);
        }

        return $parent[$categoryId]->id();
    }
}
