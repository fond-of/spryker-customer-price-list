<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\FosPriceListEntityTransfer;
use Generated\Shared\Transfer\PriceListCollectionTransfer;
use Generated\Shared\Transfer\PriceListTransfer;

interface PriceListMapperInterface
{
    /**
     * @param \Propel\Runtime\Collection\ObjectCollection|array $fosPriceListEntityTransfers
     * @param \Generated\Shared\Transfer\PriceListCollectionTransfer $priceListCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function mapEntityTransfersToTransfer(
        array $fosPriceListEntityTransfers,
        PriceListCollectionTransfer $priceListCollectionTransfer
    ): PriceListCollectionTransfer;

    /**
     * @param \Generated\Shared\Transfer\FosPriceListEntityTransfer $fosPriceListEntityTransfer
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     */
    public function mapEntityTransferToTransfer(
        FosPriceListEntityTransfer $fosPriceListEntityTransfer,
        PriceListTransfer $priceListTransfer
    ): PriceListTransfer;
}
