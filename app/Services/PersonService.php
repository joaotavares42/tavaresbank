<?php

namespace App\Services;

use App\Models\User;
use App\Models\Person;

class PersonService
{
    private $personModel;

    public function __construct(Person $personModel)
    {
        $this->personModel = $personModel;
    }

    public function createCustomer(User $user, array $data): Person
    {
        if ($user->role === 'CUSTOMER') {
            $person  = $this->personModel->create([
                'name' => $data['name'],
                'document' => $data['document'],
                'mobile' => $data['mobile'],
                'user_id' => $user->id
            ]);
            return $person;
        }
        #TODO: Retornar erro caso o tipo do usuário não seja customer.
    }
}
