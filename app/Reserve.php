<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
