<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::updateOrCreate([
            'email' => 'admin@yayasanvitka.id'
        ], [
            'email' => 'admin@yayasanvitka.id',
            'password' => bcrypt('admin123'),
            'name' => 'System Administrator',
        ]);
    }

}
