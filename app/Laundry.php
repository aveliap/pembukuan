<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
  protected $table = 'det__laundries';
  protected $primaryKey = 'id';
  public $timestamps = true;

  public function Transaksi()
  {
    return $this->hasMany('App\Transaksi', 'detLaundry_id');
  }

    public function Tipe()
    {
        return $this->belongsTo('App\Tipe', 'id_tipe_laundry');
    }
}
