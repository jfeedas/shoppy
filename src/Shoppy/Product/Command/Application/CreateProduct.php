<?php

namespace Shoppy\Product\Command\Application;

use Shoppy\Product\Command\Repository\ProductRepositoryInterface;
use Shoppy\Product\Command\Value\AbstractShopManager;
use Shoppy\Product\Command\Value\Category;
use Shoppy\Product\Command\Value\NewProduct;

/**
 * Class CreateProduct
 * @package Shoppy\Product\Command\Application
 */
abstract class CreateProduct
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * CreateProduct constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param int $managerId
     * @param int $categoryId
     * @param string $title
     * @param string $description
     * @param int $price
     *
     * @return int
     * @throws \Exception
     */
    public function create(
        int $managerId,
        int $categoryId,
        string $title,
        string $description,
        int $price
    ): int {
        $category = new Category($categoryId);
        $shopManager = $this->buildShopManager($managerId);
        $newProduct = new NewProduct($title, $description, $price);

        $product = $shopManager->createProduct($newProduct);
        $product->assignToCategory($category);

        $this->productRepository->persist($product);
        return $product->id();
    }

    /**
     * @param int $managerId
     *
     * @return AbstractShopManager
     */
    abstract protected function buildShopManager(int $managerId): AbstractShopManager;
}
