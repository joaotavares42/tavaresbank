<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends BaseModel
{
    use HasFactory;

    protected $table = 'banks';

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->account_number = rand(100, 999);
        });
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    public function agency()
    {
        return $this->hasMany(Agency::class, 'bank_id', 'id');
    }
}
