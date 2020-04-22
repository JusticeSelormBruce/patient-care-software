<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
   protected $fillable =['items_id','quantity','amount','tellers_id','reference_id'];
}
