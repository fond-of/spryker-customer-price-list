<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Business\Model;

use FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepositoryInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerExpander implements CustomerExpanderInterface
{
    /**
     * @var \FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepositoryInterface
     */
    protected $repository;

    /**
     * @param \FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepositoryInterface $repository
     */
    public function __construct(CustomerPriceListRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expand(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        if ($customerTransfer->getIdCustomer() === null) {
            return $customerTransfer;
        }

        $idCustomer = $customerTransfer->getIdCustomer();
        $priceListCollectionTransfer = $this->repository->getPriceListCollectionByIdCustomer($idCustomer);

        return $customerTransfer->setPriceListCollection($priceListCollectionTransfer);
    }
}
