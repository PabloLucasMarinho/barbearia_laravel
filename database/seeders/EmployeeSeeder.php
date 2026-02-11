<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $user = User::create([
      'name' => 'Funcionário',
      'email' => 'employee@barber.com',
      'password' => bcrypt('Aa123456'),
      'email_verified_at' => now(),
    ]);

    $employeeRole = Role::where('name', 'employee')->first();

    $user->roles()->attach($employeeRole->uuid);

    $user->details()->create([
      'document' => '318.664.730-42',
      'date_of_birth' => '1990-08-05',
      'phone' => '(21) 95973-6482',
      'address' => 'Rua do Funcionário, 456',
      'address_complement' => 'BL1 APT 101',
      'zip_code' => '67890-321',
      'neighborhood' => 'Realengo',
      'city' => 'Rio de Janeiro',
      'salary' => 1900.00,
      'admission_date' => '2025-06-01',
    ]);
  }
}
