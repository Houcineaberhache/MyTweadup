<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([ 
            [
                'nom' => 'ID OMAR',
                'prenom' => 'LOUBNA',
                'CIN' => 'Jm99227',
                'email' => 'idomar.loubna@tweadupcenter.ma',
                'password' => Hash::make('tweadupN0755'),
                'adresse' => 'Route El Farabi Dakhla Agadir', 
            ],
            [
                'nom' => 'BOULHOUDA',
                'prenom' => 'SAAD',
                'CIN' => 'JD67890',
                'email' => 'contact@tweadupcenter.com',
                'password' => Hash::make('tweadupN07905'),
                'adresse' => 'Route El Farabi Dakhla Agadir',
            ]
        ]);
    }
}
