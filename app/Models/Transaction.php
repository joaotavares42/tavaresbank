<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends BaseModel
{
    use HasFactory;

    protected $table = 'transactions';

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
}
