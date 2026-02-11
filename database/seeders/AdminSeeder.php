<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $user = User::create([
      'name' => 'Administrador',
      'email' => 'admin@barber.com',
      'password' => bcrypt('Aa123456'),
      'email_verified_at' => now(),
    ]);

    $adminRole = Role::where('name', 'admin')->first();

    $user->roles()->attach($adminRole->uuid);

    $user->details()->create([
      'document' => '376.694.980-21',
      'date_of_birth' => '1980-04-25',
      'phone' => '(21) 96482-5973',
      'address' => 'Rua do Administrador, 123',
      'address_complement' => 'Casa 2',
      'zip_code' => '12345-123',
      'neighborhood' => 'Centro',
      'city' => 'Rio de Janeiro',
      'salary' => 12000.00,
      'admission_date' => '2025-01-01',
    ]);
  }
}
