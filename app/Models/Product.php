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
        $query = Product::query();
        if ($search) {
            $query->where('name', 'LIKE', "%$search%")
                  ->orWhere('description', 'LIKE', "%$search%");
        }
        $sql = $query->toSql();
        $this->zeroMQService->execAsynch($sql);
    }

    public function aFetchResults()
    {
        return $this->zeroMQService->aSyncFetch(self::class);
    }
}
