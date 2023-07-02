<?php

declare(strict_types=1);

namespace Wiktor\StructuredData\Block\Product\View;

use Exception;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\View\Element\Template;

class StructuredData extends Template
{
    private const PRICE_FORMAT = "%.2f";

    private ProductRepositoryInterface $productRepository;
    private ManagerInterface $messageManager;

    public function __construct(
        Template\Context $context,
        ProductRepository $productRepository,
        ManagerInterface $messageManager,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->productRepository = $productRepository;
        $this->messageManager = $messageManager;
    }


    public function getProduct(): ?Product
    {
        $productId = $this->getRequest()->getParam('id');

        try {
            return $this->productRepository->getById($productId);
        } catch (Exception $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
            return null;
        }
    }

    public function isAvailable(?Product $product): bool
    {
        return !is_null($product);
    }

    public function getName(): string
    {
        return $this->getProduct()->getName();
    }

    public function getDescription(): string
    {
        return "Description sample";
    }

    public function getPrice(): string
    {
        return sprintf(
            self::PRICE_FORMAT,
            $this->getProduct()->getFinalPrice()
        );
    }
}
