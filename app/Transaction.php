<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function wallet() : BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'wallet_id');
    }

    public function reserve() : BelongsTo
    {
        return $this->belongsTo(Reserve::class, 'reserve_id');
    }
}
