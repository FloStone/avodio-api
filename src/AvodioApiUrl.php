<?php

namespace FloStone\Avodio\Api;

interface AvodioApiUrl
{
    const MANUFACTURERS = "manufacturers";
    const PRODUCTS = "products";
    const PRODUCT_CATALOG = self::MANUFACTURERS . "/{id}/product-catalog";
    const RELATIONSHIP_TABLE = self::MANUFACTURERS . "/{id}/relationship-table";
    const PRODUCT_CATALOG_EXAMPLE = self::MANUFACTURERS . "/example/product-catalog";
    const RELATIONSHIP_TABLE_EXAMPLE = self::MANUFACTURERS . "/example/relationship-table";
}