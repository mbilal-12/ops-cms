<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'Store';
    protected $fillable = ['pic_name', 'pic_contact', 'shop_status', 'deployment_status'];
    protected $primaryKey = 'internal_shop_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function merchant()
    {
        return $this->belongsTo('App\Models\Merchant');
    }
}
