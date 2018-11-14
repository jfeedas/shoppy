<?php

namespace Shoppy\Product\Command\Application;

use Shoppy\Product\Command\Repository\CategoryRepositoryInterface;
use Shoppy\Product\Command\Repository\ProductRepositoryInterface;
use Shoppy\Product\Command\Repository\ShopManagerRepositoryInterface;
use Shoppy\Product\Command\Value\NewProduct;

/**
 * Class CreateProduct
 * @package Shoppy\Product\Command\Application
 */
class CreateProduct
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
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CreateProduct constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     * @param ShopManagerRepositoryInterface $shopManagerRepository
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        ShopManagerRepositoryInterface $shopManagerRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->productRepository = $productRepository;
        $this->shopManagerRepository = $shopManagerRepository;
        $this->categoryRepository = $categoryRepository;
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
        $category = $this->categoryRepository->getById($categoryId);
        $shopManager = $this->shopManagerRepository->getById($managerId);
        $newProduct = new NewProduct($title, $description, $price);

        $product = $shopManager->createProduct($newProduct);
        $product->assignToCategory($category);

        $this->productRepository->persist($product);
        return $product->id();
    }
}
