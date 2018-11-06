<?php

namespace Shoppy\Product\Query\Application;

use Shoppy\Product\Query\Fetcher\GetProductsInCategoryFetcherInterface;
use Shoppy\Product\Query\Repository\ProductRepositoryInterface;
use Shoppy\Product\Query\Value\ProductInterface;

/**
 * Class GetProductsInCategory
 * @package Shoppy\Product\Query\Application
 */
class GetProductsInCategory
{
    /**
     * @var GetProductsInCategoryFetcherInterface
     */
    private $getProductsInCategoryFetcher;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * GetProductsInCategory constructor.
     *
     * @param GetProductsInCategoryFetcherInterface $getProductsInCategoryFetcher
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        GetProductsInCategoryFetcherInterface $getProductsInCategoryFetcher,
        ProductRepositoryInterface $productRepository
    ) {
        $this->getProductsInCategoryFetcher = $getProductsInCategoryFetcher;
        $this->productRepository = $productRepository;
    }

    /**
     * @param string $categoryId
     *
     * @return array|ProductInterface[]
     */
    public function get(string $categoryId): array
    {
        $ids = $this->getProductsInCategoryFetcher->get($categoryId);
        return $this->productRepository->getByIds($ids);
    }
}
