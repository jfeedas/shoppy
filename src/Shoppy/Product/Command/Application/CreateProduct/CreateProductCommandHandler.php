<?php

namespace Shoppy\Product\Command\Application\CreateProduct;

use Shoppy\Product\Command\Domain\Event\ProductCreated;
use Shoppy\Product\Command\Domain\ProductRepository;
use Shoppy\Product\Command\Domain\Service\ProductCreator;

/**
 * Class CreateProductCommandHandler
 * @package Shoppy\Product\Command\Application\CreateProduct
 */
class CreateProductCommandHandler
{
    /**
     * @var ProductCreator
     */
    private $productCreator;

    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * CreateProductCommandHandler constructor.
     *
     * @param ProductCreator $productCreator
     * @param ProductRepository $productRepository
     */
    public function __construct(
        ProductCreator $productCreator,
        ProductRepository $productRepository
    ) {
        $this->productCreator = $productCreator;
        $this->productRepository = $productRepository;
    }

    /**
     * @param CreateProductCommand $command
     *
     * @return array
     */
    public function execute(CreateProductCommand $command): array
    {
        $product = $this->productCreator->create();
        $this->productRepository->save($product);

        return [new ProductCreated($product->id())];
    }
}
