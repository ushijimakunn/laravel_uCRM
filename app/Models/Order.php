<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Subtotal;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::addGlobalScope(new Subtotal);
    }

    public function scopeBetweenDate($query, $startDate = null, $endDate = null) {

        // 終了日が2023/01/20 の時、 2023/01/21 00:00:00に変換し、終了日当日もデータに含めるようにする
        if (!is_null($endDate)) {
            $endDate = Carbon::parse($endDate)->addDay(1);
        }

        // 期間指定がなければそのままクエリを返す
        if(is_null($startDate) && is_null($endDate)) {
            return $query;
        }

        if(!is_null($startDate) && is_null($endDate)) {
            return $query->where('created_at', '>=', $startDate);
        }

        if(is_null($startDate) && !is_null($endDate)) {
            return $query->where('created_at', '<=', $endDate);
        }

        if(!is_null($startDate) && !is_null($endDate)) {
            return $query->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate);
        }
    }

}
