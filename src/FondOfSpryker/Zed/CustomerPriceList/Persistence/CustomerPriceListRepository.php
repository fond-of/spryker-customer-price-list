<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Persistence;

use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\PriceListCollectionTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListPersistenceFactory getFactory()
 */
class CustomerPriceListRepository extends AbstractRepository implements CustomerPriceListRepositoryInterface
{
    /**
     * @param int $idCustomer
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function getPriceListCollectionByIdCustomer(int $idCustomer): PriceListCollectionTransfer
    {
        $customerQuery = $this->getFactory()
            ->getPriceListQuery()
            ->joinWithSpyCompany()
            ->useSpyCompanyQuery()
                ->filterByIsActive(true)
                ->joinWithCompanyUser()
                ->useCompanyUserQuery()
                    ->filterByIsActive(true)
                    ->joinWithCustomer()
                    ->useCustomerQuery()
                        ->filterByIdCustomer($idCustomer)
                    ->endUse()
                ->endUse()
            ->endUse();

        $fosPriceListEntityTransfers = $this->buildQueryFromCriteria($customerQuery)->find();

        return $this->getFactory()
            ->createPriceListMapper()
            ->mapEntityTransfersToTransfer($fosPriceListEntityTransfers, new PriceListCollectionTransfer());
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function getPriceListsByIdCustomerAndCompanyUuid(CustomerTransfer $customerTransfer, CompanyTransfer $companyTransfer): PriceListCollectionTransfer
    {
        $customerTransfer->requireIdCustomer();
        $companyTransfer->requireUuid();

        $customerQuery = $this->getFactory()
            ->getPriceListQuery()
            ->joinWithSpyCompany()
            ->useSpyCompanyQuery()
                ->filterByIsActive(true)
                ->filterByUuid($companyTransfer->getUuid())
                ->joinWithCompanyUser()
                ->useCompanyUserQuery()
                    ->filterByIsActive(true)
                    ->joinWithCustomer()
                    ->useCustomerQuery()
                        ->filterByIdCustomer($customerTransfer->getIdCustomer())
                    ->endUse()
                ->endUse()
            ->endUse();

        $fosPriceListEntityTransfers = $this->buildQueryFromCriteria($customerQuery)->find();

        return $this->getFactory()
            ->createPriceListMapper()
            ->mapEntityTransfersToTransfer($fosPriceListEntityTransfers, new PriceListCollectionTransfer());
    }
}
