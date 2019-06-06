<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Persistence;

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
     * @throws
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
}
