<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Business\Model;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\PriceListCollectionTransfer;

interface CustomerReaderInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function getPriceListCollectionByIdCustomer(CustomerTransfer $customerTransfer): PriceListCollectionTransfer;
}
