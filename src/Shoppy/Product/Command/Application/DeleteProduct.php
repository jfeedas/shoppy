<?php

namespace Shoppy\Product\Command\Application;

use Shoppy\Product\Command\Application\Exception\ProductNotFoundException;
use Shoppy\Product\Command\Repository\ProductRepositoryInterface;
use Shoppy\Product\Command\Value\AbstractShopManager;

/**
 * Class DeleteProduct
 * @package Shoppy\Product\Command\Application
 */
abstract class DeleteProduct
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * DeleteProduct constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param int $managerId
     * @param int $productId
     *
     * @return bool
     * @throws ProductNotFoundException
     */
    public function delete(int $managerId, int $productId): bool
    {
        $product = $this->productRepository->getById($productId);
        if ($product === null) {
            throw new ProductNotFoundException($productId);
        }

        $manager = $this->getManager($managerId);
        $productDeleted = $manager->deleteProduct($product);

        return $this->productRepository->delete($product);
    }

    /**
     * @param int $managerId
     *
     * @return AbstractShopManager
     */
    abstract protected function getManager(int $managerId): AbstractShopManager;
}
