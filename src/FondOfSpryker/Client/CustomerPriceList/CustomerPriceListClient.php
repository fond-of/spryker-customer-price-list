<?php

namespace FondOfSpryker\Client\CustomerPriceList;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\PriceListCollectionTransfer;
use Generated\Shared\Transfer\PriceListRequestTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \FondOfSpryker\Client\CustomerPriceList\CustomerPriceListFactory getFactory()
 */
class CustomerPriceListClient extends AbstractClient implements CustomerPriceListClientInterface
{
    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomer(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->getFactory()->createZedStub()->expandCustomer($customerTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function getPriceListCollectionByIdCustomer(CustomerTransfer $customerTransfer): PriceListCollectionTransfer
    {
        return $this->getFactory()->createZedStub()->getPriceListCollectionByIdCustomer($customerTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\PriceListRequestTransfer $priceListRequestTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function getPriceListsByIdCustomerAndCompanyUuid(PriceListRequestTransfer $priceListRequestTransfer): PriceListCollectionTransfer
    {
        return $this->getFactory()->createZedStub()->getPriceListsByIdCustomerAndCompanyUuid($priceListRequestTransfer);
    }
}
