<?php

namespace Shoppy\Product\Command\Application\DeleteProduct;

use Shoppy\Product\Command\Domain\Event\ProductDeleted;
use Shoppy\Product\Command\Domain\Exception\ProductNotFoundException;
use Shoppy\Product\Command\Domain\ProductRepository;

/**
 * Class DeleteProductCommandHandler
 * @package Shoppy\Product\Command\Application\DeleteProduct
 */
class DeleteProductCommandHandler
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * DeleteProductCommandHandler constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param DeleteProductCommand $command
     *
     * @return array
     * @throws ProductNotFoundException
     */
    public function execute(DeleteProductCommand $command): array
    {
        $product = $this->productRepository->getById($command->productId());
        if (null === $product) {
            throw new ProductNotFoundException();
        }

        $this->productRepository->delete($product);
        return [new ProductDeleted($command->productId())];
    }
}
