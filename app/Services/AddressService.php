<?php

use App\Models\Address;

class AddressService
{
    private $addressModel;

    public function __construct(Address $addressModel)
    {
        $this->addressModel = $addressModel;
    }
}
