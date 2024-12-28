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

    public function aFetchCount($search = null)
    {
        $this->zeroMQService = new ZeroMQService();
        $query = Product::query()->selectRaw('COUNT(*) as count');
        if ($search) {
            $query->where('name', 'LIKE', "%$search%")
                  ->orWhere('description', 'LIKE', "%$search%");
        }
        $sql = $query->toSql();
        $bindings = $query->getBindings();
        $sqlWithBindings = vsprintf(str_replace('?', '%s', $sql), array_map(function ($binding) {
            return is_numeric($binding) ? $binding : "'$binding'";
        }, $bindings));
        $this->zeroMQService->execAsynch($sqlWithBindings);
        $result = $this->zeroMQService->aSyncFetch(self::class);
        return $result[0]->count ?? 0;
    }

    public function aFetchSearch($search = null, $offset = 0, $limit = 10)
    {
        $this->zeroMQService = new ZeroMQService();
        $query = Product::query();
        if ($search) {
            $query->where('name', 'LIKE', "%$search%")
                  ->orWhere('description', 'LIKE', "%$search%");
        }
        $sql = $query->toSql();
        $bindings = $query->getBindings();
        $sqlWithBindings = vsprintf(str_replace('?', '%s', $sql), array_map(function ($binding) {
            return is_numeric($binding) ? $binding : "'$binding'";
        }, $bindings));
        $this->zeroMQService->execAsynch($sqlWithBindings);
    }

    public function aFetchResults()
    {
        return $this->zeroMQService->aSyncFetch(self::class);
    }
}
