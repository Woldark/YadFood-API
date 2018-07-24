<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    public function foods() : HasMany
    {
        return $this->hasMany(Food::class, 'restaurant_id');
    }
}
