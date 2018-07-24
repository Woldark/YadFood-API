<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use Authenticatable;

    public function transactions() : HasMany
    {
        return $this->hasMany(Transaction::class, 'student_id');
    }

    public function wallet() : BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'wallet_id');
    }
}
