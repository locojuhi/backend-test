<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Backend\User::class, 50)->create();
        DB::table('users')->insert([
            'first_name' => 'danny',
	        'last_name' => 'torres',
	        'email' => 'danny.torresxd@gmail.com',
	        'password' => bcrypt('admin'),
	        'created_at' => Carbon::now(),
	        'updated_at' => Carbon::now(),
	        'role_id' => 1,
	        'active' => true,
        ]);
    }
}
