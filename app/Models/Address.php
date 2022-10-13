<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends BaseModel
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'address',
        'zipcode',
        'number',
        'neighborhood',
        'city',
        'state',
        'complement'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }
}
