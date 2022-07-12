<?php


namespace App\Repositories;


use App\Repositories\Interfaces\BidRepositoriesInterface;
use Illuminate\Support\Facades\Storage;

class FileRepository implements BidRepositoriesInterface
{

    const FILE = 'bid.txt';

    public function make($data): void
    {
        $data = json_encode($data);

        $this->save($data);
    }

    public function save($data): void
    {
        !Storage::exists(self::FILE) ? Storage::put(self::FILE, $data) : Storage::append(self::FILE,$data);
    }
}
