<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends BaseModel
{
    use HasFactory;
    protected $table = 'accounts';

    protected $hidden = ['password'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->account_number = rand(1000, 9999);
        });
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id', 'id');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    public function billet()
    {
        return $this->hasMany(Billet::class, 'account_owner', 'id');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'account_id', 'id');
    }
}
