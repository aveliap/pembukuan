<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id_cust';
    public $timestamps = true;

    public function Transaksi()
  {
      return $this->hasMany('App\Transaksi', 'customer_id');
  }
}
