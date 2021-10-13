<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Communication\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\PriceListCollectionTransfer;
use Generated\Shared\Transfer\PriceListRequestTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \FondOfSpryker\Zed\CustomerPriceList\Business\CustomerPriceListFacadeInterface getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerAction(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->getFacade()->expandCustomer($customerTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function getPriceListCollectionByIdCustomerAction(CustomerTransfer $customerTransfer): PriceListCollectionTransfer
    {
        return $this->getFacade()->getPriceListCollectionByIdCustomer($customerTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\PriceListRequestTransfer $priceListRequestTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function getPriceListsByIdCustomerAndCompanyUuidAction(PriceListRequestTransfer $priceListRequestTransfer): PriceListCollectionTransfer
    {
        return $this->getFacade()->getPriceListsByIdCustomerAndCompanyUuid($priceListRequestTransfer);
    }
}
