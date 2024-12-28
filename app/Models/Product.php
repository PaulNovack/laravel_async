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
    public static function sendQuery()
    {
        $zeroMQService = new ZeroMQService();
        $sql = "SELECT * FROM products";
        $zeroMQService->execAsynch($sql);
    }

    public static function fetchResults()
    {
        $zeroMQService = new ZeroMQService();
        return $zeroMQService->aSyncFetch(self::class);
    }
}
