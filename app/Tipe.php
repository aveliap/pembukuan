<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
  protected $table = 'tipe__laundries';
  protected $primaryKey = 'id_tipe';
  public $timestamps = true;

  public function Laundry()
      {
          return $this->hasMany('App\Laundry', 'id_tipe_laundry');
      }
}
