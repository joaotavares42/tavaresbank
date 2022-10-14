<?php

namespace App\Services;

use App\Models\Person;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AccountService
{
    private $accountModel;

    public function __construct(Account $accountModel)
    {
        $this->accountModel = $accountModel;
    }

    public function createAccount(Person $person, array $data): Account
    {
        $account = $this->accountModel->create([
            'agency_id' => '1',
            'person_id' => $person->id,
            'password' => Hash::make($data['password']),
        ]);

        return $account;
    }
}
