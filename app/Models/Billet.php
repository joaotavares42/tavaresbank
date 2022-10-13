<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billet extends BaseModel
{
    use HasFactory;

    protected $table = 'billets';

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_owner', 'id');
    }
}
