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
    private ZeroMQService $zeroMQService;

    public function aFetchAll($search = null)
    {
        $this->zeroMQService = new ZeroMQService();
        $sql = "SELECT * FROM products";
        if ($search) {
            $sql .= " WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
        }
        $this->zeroMQService->execAsynch($sql);
    }

    public function aFetchResults()
    {
        return $this->zeroMQService->aSyncFetch(self::class);
    }
}
