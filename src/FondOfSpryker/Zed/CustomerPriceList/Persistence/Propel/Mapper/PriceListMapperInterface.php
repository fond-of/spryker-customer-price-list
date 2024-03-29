<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\PriceListCollectionTransfer;
use Generated\Shared\Transfer\PriceListTransfer;
use Orm\Zed\PriceList\Persistence\Base\FosPriceList;
use Propel\Runtime\Collection\ObjectCollection;

interface PriceListMapperInterface
{
    /**
     * @param \Propel\Runtime\Collection\ObjectCollection<\Orm\Zed\PriceList\Persistence\Base\FosPriceList> $entityCollection
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function mapEntityCollectionToTransfer(ObjectCollection $entityCollection): PriceListCollectionTransfer;

    /**
     * @param \Orm\Zed\PriceList\Persistence\Base\FosPriceList $entity
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     */
    public function mapEntityToTransfer(FosPriceList $entity): PriceListTransfer;
}
