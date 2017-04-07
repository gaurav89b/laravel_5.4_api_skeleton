<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $userRoles = array(
            ['id' => 1, 'fk_users_role' => '1', 'user_name' => 'admin@admin.com', 'first_name' => 'Twsitar',
                'last_name' => 'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt(123456),
                'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
        DB::table('users')->insert($userRoles);
    }
}
