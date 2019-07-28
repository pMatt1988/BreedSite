<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$wU.A37rl38Fdj0U0SfsZuuwlc5xRCQorNegRQ.S.tgtubA0U7E2wG',
            'remember_token' => null,
            'created_at'     => '2019-07-22 18:36:17',
            'updated_at'     => '2019-07-22 18:36:17',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
