<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Persistence;

use FondOfSpryker\Zed\CustomerPriceList\CustomerPriceListDependencyProvider;
use FondOfSpryker\Zed\CustomerPriceList\Persistence\Propel\Mapper\PriceListMapper;
use FondOfSpryker\Zed\CustomerPriceList\Persistence\Propel\Mapper\PriceListMapperInterface;
use Orm\Zed\PriceList\Persistence\FosPriceListQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepositoryInterface getRepository()
 */
class CustomerPriceListPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\PriceList\Persistence\FosPriceListQuery
     */
    public function getPriceListQuery(): FosPriceListQuery
    {
        return $this->getProvidedDependency(CustomerPriceListDependencyProvider::PROPEL_PRICE_LIST_QUERY);
    }

    /**
     * @return \FondOfSpryker\Zed\CustomerPriceList\Persistence\Propel\Mapper\PriceListMapperInterface
     */
    public function createPriceListMapper(): PriceListMapperInterface
    {
        return new PriceListMapper();
    }
}
