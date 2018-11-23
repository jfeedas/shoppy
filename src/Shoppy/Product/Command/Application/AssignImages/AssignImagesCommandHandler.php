<?php

namespace Shoppy\Product\Command\Application\AssignImages;

use Shoppy\Product\Command\Domain\Exception\ProductNotFoundException;
use Shoppy\Product\Command\Domain\ProductRepository;

/**
 * Class AssignImagesCommandHandler
 * @package Shoppy\Product\Command\Application\AssignImages
 */
class AssignImagesCommandHandler
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * AssignImagesCommandHandler constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param AssignImagesCommand $command
     *
     * @return array
     * @throws ProductNotFoundException
     */
    public function execute(AssignImagesCommand $command): array
    {
        $events = [];
        $product = $this->productRepository->getById($command->productId());
        if (null === $product) {
            throw new ProductNotFoundException();
        }

        $images = $command->getImages();
        foreach ($images as $image) {
            $events[] = $product->assignImage($image);
        }

        $this->productRepository->save($product);
        return $events;
    }
}
