<?php


namespace App\Repositories;


use App\Models\Bid;
use App\Repositories\Interfaces\BidRepositoriesInterface;

class  DatabaseRepository implements BidRepositoriesInterface
{

    public function make($data): void
    {
        Bid::create($data);
    }
}
