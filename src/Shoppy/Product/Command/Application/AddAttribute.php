<?php

namespace Shoppy\Product\Command\Application;

use Shoppy\Product\Command\Application\Exception\ProductNotFoundException;
use Shoppy\Product\Command\Repository\ProductRepositoryInterface;
use Shoppy\Product\Command\Value\Attribute;

/**
 * Class AddAttribute
 * @package Shoppy\Product\Command\Application
 */
abstract class AddAttribute
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * AddAttribute constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param string $productId
     * @param string $attributeName
     * @param string $attributeValue
     *
     * @return bool
     * @throws ProductNotFoundException
     */
    public function addAttribute(string $productId, string $attributeName, string $attributeValue): bool
    {
        $product = $this->productRepository->getById($productId);
        if ($product === null) {
            throw new ProductNotFoundException($productId);
        }

        $product->addAttribute(new Attribute($attributeName, $attributeValue));
        $this->productRepository->persist($product);
        return true;
    }
}
