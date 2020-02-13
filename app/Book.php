<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $guarded = [
    'created_at',
    'updated_at'
  ];

  public function user()
  {
    return  $this->belongsTo('App\User');
  }
}
