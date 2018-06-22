<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = new Role();
      $role_admin->name = 'Admin';
     
      $role_admin->save();

      $role_client = new Role();
      $role_client->name = 'Client';
  
      $role_client->save();
    }
}
