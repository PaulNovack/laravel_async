<?php

namespace App\Models;

use App\Services\ZeroMQService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
    ];
    private $zeroMQService;

    public function aFetchAll()
    {
        $this->zeroMQService = new ZeroMQService();
        $sql = "SELECT * FROM products";
        $this->zeroMQService->execAsynch($sql);
    }

    public function aFetchResults()
    {
        return $this->zeroMQService->aSyncFetch(self::class);
    }
}
