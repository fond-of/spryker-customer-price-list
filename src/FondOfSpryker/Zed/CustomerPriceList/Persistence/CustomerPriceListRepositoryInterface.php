<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Persistence;

use Generated\Shared\Transfer\PriceListCollectionTransfer;

interface CustomerPriceListRepositoryInterface
{
    /**
     * @param int $idCustomer
     *
     * @throws
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function getPriceListCollectionByIdCustomer(int $idCustomer): PriceListCollectionTransfer;
}
