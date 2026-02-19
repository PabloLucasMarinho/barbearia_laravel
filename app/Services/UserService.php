<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class UserService
{
  public function createEmployee(array $data): User
  {
    return DB::transaction(function () use ($data) {
      $tempPassword = Str::password(8);

      $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => null,
      ]);

      $user->details()->create([
        'user_uuid' => $user['uuid'],
        'document' => $data['document'],
        'date_of_birth' => $data['date_of_birth'],
        'phone' => $data['phone'],
        'zip_code' => $data['zip_code'],
        'address' => $data['address'],
        'address_complement' => $data['address_complement'],
        'neighborhood' => $data['neighborhood'],
        'city' => $data['city'],
        'salary' => $data['salary'],
        'admission_date' => $data['admission_date'],
      ]);

      Password::sendResetLink([
        'email' => $user->email,
      ]);

      $employeeRoleUuid = Role::where('name', 'employee')->value('uuid');
      $user->roles()->attach($employeeRoleUuid);

      return $user;
    });
  }
}
