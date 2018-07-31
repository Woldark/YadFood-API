<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Day extends Model
{
    public function foods(): BelongsToMany
    {
        return $this->belongsToMany(Food::class);
    }
}
