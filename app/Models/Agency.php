<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends BaseModel
{
    use HasFactory;

    protected $table = 'agencies';

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->account_number = rand(1000, 9999);
        });
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }

    public function acccount()
    {
        return $this->hasMany(Account::class, 'agency_id', 'id');
    }
}
