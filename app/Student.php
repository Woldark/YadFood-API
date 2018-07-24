<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use Authenticatable;

    public function transactions() : HasMany
    {
        return $this->hasMany(Transaction::class, 'student_id');
    }

    public function wallet() : HasOne
    {
        return $this->hasOne(Wallet::class, 'student_id');
    }
}
