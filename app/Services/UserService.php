<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    private $userModel;
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getAll(): Collection
    {
        $users = $this->userModel->all();
        return $users;
    }
}
