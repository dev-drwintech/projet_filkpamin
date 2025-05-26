<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            [
                 'id' => Str::uuid()->toString(),
                'nom' => 'admin',
            ],

            [
                'id' => Str::uuid()->toString(),
               'nom' => 'partenaire',
            ],

            [
                'id' => Str::uuid()->toString(),
                'nom' => 'utilisateur'

            ],
        ]);
    }
}
