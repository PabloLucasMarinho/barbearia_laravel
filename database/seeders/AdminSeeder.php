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
      'address' => 'Rua do Administrador, 123',
      'address_complement' => 'Casa 2',
      'zip_code' => '12345-123',
      'neighborhood' => 'Centro',
      'city' => 'Rio de Janeiro',
      'phone' => '21964825973',
      'salary' => 12000.00,
      'admission_date' => '2025-01-01',
    ]);
  }
}
