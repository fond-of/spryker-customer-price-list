<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Business\Model;

use FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepositoryInterface;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\PriceListCollectionTransfer;
use Generated\Shared\Transfer\PriceListRequestTransfer;

class CustomerPriceListReader implements CustomerPriceListReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepositoryInterface
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

        return $this->customerPriceListRepository->getPriceListCollectionByIdCustomer($idCustomer);
    }

    /**
     * @param \Generated\Shared\Transfer\PriceListRequestTransfer $priceListRequestTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function getPriceListsByIdCustomerAndCompanyUuid(PriceListRequestTransfer $priceListRequestTransfer): PriceListCollectionTransfer
    {
        $priceListRequestTransfer
            ->requireCustomer()
            ->requireCompany();

        return $this->customerPriceListRepository->getPriceListsByIdCustomerAndCompanyUuid($priceListRequestTransfer->getCustomer(), $priceListRequestTransfer->getCompany());
    }
}
