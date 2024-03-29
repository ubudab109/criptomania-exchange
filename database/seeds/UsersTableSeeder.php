<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $date = \Carbon\Carbon::now();

        $users = [
            [
                'user_role_management_id' => USER_ROLE_SUPER_ADMIN,
                'username' => 'superadmin',
                'email' => 'superadmin@admin.org',
                'password' => Hash::make('superadmin'),
                'is_email_verified' => EMAIL_VERIFICATION_STATUS_ACTIVE,
                'is_accessible_under_maintenance' => UNDER_MAINTENANCE_ACCESS_ACTIVE,
                'is_active' => ACTIVE_STATUS_ACTIVE,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_role_management_id' => USER_ROLE_USER,
                'username' => 'trader',
                'email' => 'trader@trader.org',
                'password' => Hash::make('trader'),
                'is_accessible_under_maintenance' => UNDER_MAINTENANCE_ACCESS_INACTIVE,
                'is_email_verified' => EMAIL_VERIFICATION_STATUS_ACTIVE,
                'is_active' => ACTIVE_STATUS_ACTIVE,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_role_management_id' => USER_ROLE_USER,
                'username' => 'trader2',
                'email' => 'trader2@trader.org',
                'password' => Hash::make('trader2'),
                'is_accessible_under_maintenance' => UNDER_MAINTENANCE_ACCESS_INACTIVE,
                'is_email_verified' => EMAIL_VERIFICATION_STATUS_ACTIVE,
                'is_active' => ACTIVE_STATUS_ACTIVE,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_role_management_id' => USER_ROLE_TRADE_ANALYST,
                'username' => 'tradeanalyst',
                'email' => 'tradeanalyst@trader.org',
                'password' => Hash::make('tradeanalyst'),
                'is_accessible_under_maintenance' => UNDER_MAINTENANCE_ACCESS_INACTIVE,
                'is_email_verified' => EMAIL_VERIFICATION_STATUS_ACTIVE,
                'is_active' => ACTIVE_STATUS_ACTIVE,
                'created_at' => $date,
                'updated_at' => $date
            ],
        ];

        DB::table('users')->insert($users);
    }
}
