<?php


namespace App\Services;


use App\Repositories\DatabaseRepository;
use App\Repositories\FileRepository;
use App\Repositories\Interfaces\BidRepositoriesInterface;

class BidService
{
    public const REPOSITORIES =
        [
            'database' => DatabaseRepository::class,
            'file' => FileRepository::class
        ];

    private function getRepository(string $name = null): BidRepositoriesInterface
    {
        $name = config('services.save.bid_rep');
        $class = self::REPOSITORIES[$name];

        return new $class;
    }

    public function create($data): void
    {
        $repository = $this->getRepository();
        $repository->make($data);
    }
}
