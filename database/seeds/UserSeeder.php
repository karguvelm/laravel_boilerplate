<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Admin', 'password' => Hash::make('123456')]
        );
    }
}
