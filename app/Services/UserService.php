<?php

namespace App\Services;

use App\Models\User;
use App\Enums\EUserRole;
use App\Services\PersonService;
use App\Services\AccountService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;


class UserService
{
    private $userModel;
    private $personService;
    private $accountService;

    public function __construct(
        User $userModel,
        PersonService $personService,
        AccountService $accountService
    ) {
        $this->userModel = $userModel;
        $this->personService = $personService;
        $this->accountService = $accountService;
    }

    public function getAll(): Collection
    {
        $users = $this->userModel->all();
        return $users;
    }

    public function store(array $data): User
    {
        $user =  $this->userModel->create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role']
        ]);
        return $user;
    }

    public function create(array $data): User
    {
        if ($data['user']['role'] === 'CUSTOMER') {
            $user = $this->store($data['user']);
            $person = $this->personService->createCustomer($user, $data['person']);
            $account = $this->accountService->createAccount($person, $data['account']);
        }

        return $user;
    }

    public function createCustomer(User $user, array $data)
    {
        $user->person->create([
            'name' => $data['person']['name'],
            'document' => $data['person']['document'],
            'mobile' => $data['person']['mobile'],
            'user_id' => $user->id
        ]);

        $user->person->address->create([
            'address' => $data['person']['address']['address'],
            'zipcode' => $data['person']['address']['zipcode'],
            'number' => $data['person']['address']['number'],
            'neighborhood' => $data['person']['address']['neighborhood'],
            'city' => $data['person']['address']['city'],
            'state' => $data['person']['address']['state'],
            'complement' => $data['person']['address']['complement'] ?? NULL,
            'person_id' => $user->person->id
        ]);

        $user->person->account->create([
            'password' => Hash::make($data['account']['password']),
            'agency_id' => '1',
            'person_id' => $user->person->id
        ]);
    }
}
