<?php

namespace Shoppy\Product\Query\Application;

use Shoppy\Product\Query\Repository\ProductRepositoryInterface;
use Shoppy\Product\Query\Value\ProductInterface;

/**
 * Class GetProductsByIds
 * @package Shoppy\Product\Query\Application
 */
class GetProductsByIds
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * GetProductsByIds constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param array $ids
     *
     * @return array|ProductInterface[]
     */
    public function get(array $ids): array
    {
        return $this->productRepository->getByIds($ids);
    }
}
