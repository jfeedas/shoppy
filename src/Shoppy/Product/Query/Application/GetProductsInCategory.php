<?php

namespace Shoppy\Product\Query\Application;

use Implementation\Product\Query\Repository\ProductRepository;
use Shoppy\Product\Query\Fetcher\GetProductsInCategoryFetcherInterface;
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
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * GetProductsInCategory constructor.
     *
     * @param GetProductsInCategoryFetcherInterface $getProductsInCategoryFetcher
     * @param ProductRepository $productRepository
     */
    public function __construct(
        GetProductsInCategoryFetcherInterface $getProductsInCategoryFetcher,
        ProductRepository $productRepository
    ) {
        $this->getProductsInCategoryFetcher = $getProductsInCategoryFetcher;
        $this->productRepository = $productRepository;
    }

    /**
     * @param int $categoryId
     *
     * @return array|ProductInterface[]
     */
    public function get(int $categoryId): array
    {
        $ids = $this->getProductsInCategoryFetcher->get($categoryId);
        return $this->productRepository->getByIds($ids);
    }
}