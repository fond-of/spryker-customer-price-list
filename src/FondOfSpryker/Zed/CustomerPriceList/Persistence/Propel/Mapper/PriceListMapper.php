<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\FosPriceListEntityTransfer;
use Generated\Shared\Transfer\PriceListCollectionTransfer;
use Generated\Shared\Transfer\PriceListTransfer;

class PriceListMapper implements PriceListMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\FosPriceListEntityTransfer[] $fosPriceListEntityTransfers
     * @param \Generated\Shared\Transfer\PriceListCollectionTransfer $priceListCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function mapEntityTransfersToTransfer(
        array $fosPriceListEntityTransfers,
        PriceListCollectionTransfer $priceListCollectionTransfer
    ): PriceListCollectionTransfer {
        foreach ($fosPriceListEntityTransfers as $fosPriceList) {
            $priceListTransfer = new PriceListTransfer();
            $priceListTransfer = $this->mapEntityTransferToTransfer($fosPriceList, $priceListTransfer);

            $priceListCollectionTransfer->addPriceList($priceListTransfer);
        }

        return $priceListCollectionTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\FosPriceListEntityTransfer $fosPriceListEntityTransfer
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     */
    public function mapEntityTransferToTransfer(
        FosPriceListEntityTransfer $fosPriceListEntityTransfer,
        PriceListTransfer $priceListTransfer
    ): PriceListTransfer {
        return $priceListTransfer->fromArray(
            $fosPriceListEntityTransfer->toArray(),
            true
        );
    }
}
