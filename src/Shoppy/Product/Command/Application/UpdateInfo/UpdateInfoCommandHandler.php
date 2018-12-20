<?php

namespace Shoppy\Product\Command\Application\UpdateInfo;

use Shoppy\Product\Command\Domain\Exception\ProductNotFoundException;
use Shoppy\Product\Command\Domain\ProductRepository;

/**
 * Class UpdateInfoCommandHandler
 * @package Shoppy\Product\Command\Application\UpdateInfo
 */
class UpdateInfoCommandHandler
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * UpdateInfoCommandHandler constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param UpdateInfoCommand $updateInfoCommand
     *
     * @return array
     * @throws ProductNotFoundException
     */
    public function execute(UpdateInfoCommand $updateInfoCommand): array
    {
        $events = [];

        $product = $this->productRepository->getById($updateInfoCommand->productId());
        if (null === $product) {
            throw new ProductNotFoundException();
        }

        if ($updateInfoCommand->title() !== null) {
            $events[] = $product->changeTitle($updateInfoCommand->title());
        }

        if ($updateInfoCommand->description() !== null) {
            $events[] = $product->changeDescription($updateInfoCommand->description());
        }

        if ($updateInfoCommand->price() !== null) {
            $events[] = $product->changePrice($updateInfoCommand->price());
        }

        return $events;
    }
}
