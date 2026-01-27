<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $userUuid = (string) Str::uuid();

    DB::table('users')->insert([
      'uuid' => $userUuid,
      'name' => 'Funcionário',
      'email' => 'employee@barber.com',
      'email_verified_at' => now(),
      'password' => bcrypt('Aa123456'),
      'created_at' => now(),
      'updated_at' => now(),
    ]);

    $employeeRole = DB::table('roles')->where('name', 'employee')->first();

    DB::table('user_role')->insert([
      'user_uuid' => $userUuid,
      'role_uuid' => $employeeRole->uuid,
    ]);

    // admin details
    DB::table('user_details')->insert([
      'uuid' => (string) Str::uuid(),
      'user_uuid' => $userUuid,
      'address' => 'Rua do Funcionário, 456',
      'address_complement' => 'Casa 4',
      'zip_code' => '12345-123',
      'neighborhood' => 'Centro',
      'city' => 'Rio de Janeiro',
      'phone' => '21999999999',
      'salary' => 2100.00,
      'admission_date' => '2025-01-01',
      'created_at' => now(),
      'updated_at' => now(),
    ]);
  }
}
