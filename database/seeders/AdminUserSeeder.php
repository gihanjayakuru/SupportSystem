<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AdminUserSeeder extends Seeder
{
    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        ModelsUser::create([

            'name' => 'Gihan',

            'email' => 'gihan@gmail.com',

            'password' => bcrypt('123456'),

        ]);

    }


}