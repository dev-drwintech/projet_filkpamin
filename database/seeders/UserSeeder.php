<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = Role::where('nom', 'admin')->first()->id;
        $partenaire = Role::where('nom', 'partenaire')->first()->id;
        $utilisateur = Role::where('nom', 'utilisateur')->first()->id;


        $admin1 =  [
            'id' => Str::uuid()->toString(),
            'name' => 'Md Rafsan Jani Rafin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
            'avatar' => 'https://www.gravatar.com/avatar/' . md5('admin@gmail.com'),
            'role_id' => $admin
        ];

        $partenaire2 =  [
            'id' => Str::uuid()->toString(),
            'name' => 'Md Imam Hossain',
            'email' => 'partenaire@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
            'avatar' => 'https://www.gravatar.com/avatar/' . md5('partenaire@gmail.com'),
            'role_id' => $partenaire
        ];

        $user2 =  [
            'id' => Str::uuid()->toString(),
            'name' => 'Radoanul Haider',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
            'avatar' => 'https://www.gravatar.com/avatar/' . md5('user@gmail.com'),
            'role_id' => $utilisateur
        ];

        DB::table('users')->insert([
            $admin1,
            $partenaire2,
            $user2
        ]);

        // partenaire portefeuille
        DB::table('portefeuilles')->insert([
            [
                'id' => Str::uuid()->toString(),
                'user_id' => $partenaire2['id'],
                'solde' => 0,
                'solde_retire' => 0,
            ]
        ]);
    }
}
