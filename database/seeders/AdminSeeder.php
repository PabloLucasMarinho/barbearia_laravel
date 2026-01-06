<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('users')->insert([
      'department_id' => 1,   // Administração
      'name' => 'Administrador',
      'email' => 'admin@barber.com',
      'email_verified_at' => now(),
      'password' => bcrypt('Aa123456'),
      'role' => 'admin',
      'permissions' => '["admin"]',
      'created_at' => now(),
      'updated_at' => now(),
    ]);

    // admin details
    DB::table('user_details')->insert([
      'user_id' => 1,
      'address' => 'Rua do Administrador, 123',
      'address_complement' => 'Casa 2',
      'zip_code' => '1234-123',
      'neighborhood' => 'Rio de Janeiro',
      'city' => 'Rio de Janeiro',
      'phone' => '21999999999',
      'salary' => 12000.00,
      'admission_date' => '2025-01-01',
      'created_at' => now(),
      'updated_at' => now(),
    ]);

    // admin department
    DB::table('departments')->insert([
      'name' => 'Administração',
      'created_at' => now(),
      'updated_at' => now(),
    ]);
  }
}
