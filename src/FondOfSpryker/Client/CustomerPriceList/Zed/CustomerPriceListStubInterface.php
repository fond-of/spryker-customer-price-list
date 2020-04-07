<?php

namespace FondOfSpryker\Client\CustomerPriceList\Zed;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\PriceListCollectionTransfer;

interface CustomerPriceListStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomer(CustomerTransfer $customerTransfer): CustomerTransfer;

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function getPriceListCollectionByIdCustomer(CustomerTransfer $customerTransfer): PriceListCollectionTransfer;
}
