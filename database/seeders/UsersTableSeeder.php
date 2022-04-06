<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Anwar',
            'email' => 'anwar@gmail.com',
            'password' => bcrypt('123456'),
            'roles' => json_encode(['CUSTOMER']),
            'status' => 'ACTIVE',
        ],
        [
            'name' => 'Budi',
            'email' => 'budi@gmail.com',
            'password' => bcrypt('123456'),
            'roles' => json_encode(['CUSTOMER']),
            'status' => 'ACTIVE',
        ]);

        $users = [];
        $faker = Faker::create();
        for($i=0;$i<5;$i++){
            $avatar_path = 'public/images/users';
            $avatar_fullpath = $faker->image( $avatar_path, 200, 250, 'people', true, true, 'people');
            $avatar = str_replace($avatar_path . '/' , '', $avatar_fullpath);
            $users[$i] = [
                'name'       => $faker->name,
                'email'      => $faker->unique()->safeEmail,
                'password'   => bcrypt('123456'),
                'roles'      => json_encode(['CUSTOMER']),
                'avatar'     => $avatar,
                'status'     => 'ACTIVE',
                'created_at' => Carbon::now(),
            ];
        }
        DB::table('users')->insert($users);
    }
}
