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
     * @param string $managerId
     * @param string $categoryId
     * @param string $title
     * @param string $description
     * @param int $price
     *
     * @return string
     */
    public function create(
        string $managerId,
        string $categoryId,
        string $title,
        string $description,
        int $price
    ): string {
        $category = new Category($categoryId);
        $shopManager = $this->buildShopManager($managerId);
        $newProduct = new NewProduct($title, $description, $price);

        $product = $shopManager->createProduct($newProduct);
        $product->assignToCategory($category);

        $this->productRepository->persist($product);
        return $product->id();
    }

    /**
     * @param string $managerId
     *
     * @return AbstractShopManager
     */
    abstract protected function buildShopManager(string $managerId): AbstractShopManager;
}
