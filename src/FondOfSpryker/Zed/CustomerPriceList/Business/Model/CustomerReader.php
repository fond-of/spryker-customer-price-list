<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Business\Model;

use FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepositoryInterface;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\PriceListCollectionTransfer;

class CustomerReader implements CustomerReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerPriceListRepositoryInterface
     */
    protected $customerPriceListRepository;

    /**
     * @param \FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepositoryInterface $customerPriceListRepository
     */
    public function __construct(
        CustomerPriceListRepositoryInterface $customerPriceListRepository
    ) {
        $this->customerPriceListRepository = $customerPriceListRepository;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function getPriceListCollectionByIdCustomer(CustomerTransfer $customerTransfer): PriceListCollectionTransfer
    {
        $customerTransfer->requireIdCustomer();

        $idCustomer = $customerTransfer->getIdCustomer();

        $priceListCollectionTransfer = $this->customerPriceListRepository->getPriceListCollectionByIdCustomer($idCustomer);

        return $priceListCollectionTransfer;
    }
}
