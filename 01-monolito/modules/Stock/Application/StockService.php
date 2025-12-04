<?php

namespace RentBike\Modules\Stock\Application;

use RentBike\Modules\Shared\Domain\ValueObject\Id;
use RentBike\Modules\Stock\Domain\Stock;

class StockService
{
    public function getStock(Id $id)
    {
        $stockModel = \App\Models\Stock::findOrFail($id->getValue());

        $stockEntity = new Stock();
        $stockEntity->fill($stockModel->toArray());

        return $stockEntity;
    }
}
