<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = array(
        ['id' => 1, 'name' => 'user', 'public_name' => 'User'],
        ['id' => 2, 'name' => 'admin', 'public_name' => 'Admin'],
      );
      DB::table('roles')->insert($data);
    }
}
