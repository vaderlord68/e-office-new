<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $sampleUserData = [
        [
            'first_name' => 'User',
            'last_name' => 'Admin',
            'email' => 'user@admin.com',
            'account' => 'admin',
            'password' => 'ige',
            'address' => '',
            'phone_number' => '',
            'date_of_birth' => '',
            'created_at' => '',
            'updated_at' => '',
        ]
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function authenticate($userData)
    {
        foreach ($this->sampleUserData as $storedUserData) {
            if (
                ($userData['user_account'] == $storedUserData['account']) &&
                ($userData['user_password'] == $storedUserData['password'])
            ) {
                    return true;
            }
        }
        return false;

    }
}
