<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reserve extends Model
{
    public function transaction(): HasOne
    {
        return $this->hasOne(Transaction::class, 'reserve_id');
    }
}
