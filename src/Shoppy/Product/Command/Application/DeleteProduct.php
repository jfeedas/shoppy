<?php

namespace Shoppy\Product\Command\Application;

use Shoppy\Product\Command\Application\Exception\ProductNotFoundException;
use Shoppy\Product\Command\Repository\ProductRepositoryInterface;
use Shoppy\Product\Command\Repository\ShopManagerRepositoryInterface;

/**
 * Class DeleteProduct
 * @package Shoppy\Product\Command\Application
 */
class DeleteProduct
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var ShopManagerRepositoryInterface
     */
    private $shopManagerRepository;

    /**
     * DeleteProduct constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     * @param ShopManagerRepositoryInterface $shopManagerRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        ShopManagerRepositoryInterface $shopManagerRepository
    ) {
        $this->productRepository = $productRepository;
        $this->shopManagerRepository = $shopManagerRepository;
    }

    /**
     * @param string $managerId
     * @param string $productId
     *
     * @return bool
     * @throws ProductNotFoundException
     */
    public function delete(string $managerId, string $productId): bool
    {
        $product = $this->productRepository->getById($productId);
        if ($product === null) {
            throw new ProductNotFoundException($productId);
        }

        $manager = $this->shopManagerRepository->getById($managerId);
        $manager->deleteProduct($product);
        return $this->productRepository->delete($product);
    }
}
