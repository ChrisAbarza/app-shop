<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function details($value='')
    {
    	return $this->hasMany(CartDetail::class);
    }
}
