<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = ['orderdate', 'user_id', 'total',  'stuatus', 'orderno', 'note'];

  public function items()
    {
        return $this->belongsToMany('App\Order','orderdetails')
                    ->withPivot('qty')
                    ->withTimestamps();
    }
}
