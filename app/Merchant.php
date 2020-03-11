<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $table = 'Merchant';
    protected $primaryKey = 'merchant_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function store()
    {
        return $this->belongsToMany('App\Models\Store');
    }
}
