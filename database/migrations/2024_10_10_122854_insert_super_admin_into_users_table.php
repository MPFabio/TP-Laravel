<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertSuperAdminIntoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            'id' => 1,
            'username' => 'Super Admin',
            'name' => 'Super Admin',
            'title' => null,
            'email' => 'hamza.ougayour@cybergenix.fr',
            'phone' => null,
            'gender' => null,
            'type' => 'super admin',
            'is_active' => 1,
            'user_roles' => null,
            'lang' => 'fr',
            'password' => bcrypt('password'), // Utilise bcrypt pour le hachage du mot de passe
            'mode' => 'light',
            'avatar' => 'avatar.png',
            'plan' => null,
            'plan_expire_date' => null,
            'plan_is_active' => 1,
            'created_by' => 0,
            'remember_token' => null,
            'created_at' => '2024-09-30 14:49:19',
            'updated_at' => '2024-09-30 14:49:19',
            'messenger_color' => '#2180f3',
            'dark_mode' => 0,
            'active_status' => 0
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->where('id', 1)->delete();
    }
}
