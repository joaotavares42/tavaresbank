<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends BaseModel
{
    use HasFactory;

    protected $table = 'persons';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
