<?php

use Illuminate\Database\Seeder;

class CompaniesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'name'     => 'Google',
                'email'    => 'google@gmail.com',
                'logo'     => 'logo-google.jpg',
                'website'  => 'google.com.br',
                'password' => '12345'
            ],
            [
                'name'     => 'Microsoft',
                'email'    => 'microsoft@hotmail.com',
                'logo'     => 'logo-microsoft.jpg',
                'website'  => 'microsoft.com.br',
                'password' => '54321'
            ],
            [
                'name'     => 'Apple',
                'email'    => 'apple@apple.com',
                'logo'     => 'logo-apple.jpg',
                'website'  => 'apple.com.br',
                'password' => '1345'
            ]
        ];
        DB::table('companies')->insert($companies);
    }
}
