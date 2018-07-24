<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function foods()
    {
        return $this->belongsToMany(Food::class);
    }
}
