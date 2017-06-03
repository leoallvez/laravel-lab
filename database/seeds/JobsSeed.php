<?php

use Illuminate\Database\Seeder;

class JobsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = [
            [
                'title'       => 'Developer',
                'local'       => 'On company',
                'description' => 'Need to make code',
                'remote'      => 'no',
                'type'        => '3',
                'company_id'  => 1
            ]
        ];
        DB::table('jobs')->insert($jobs);
    }
}
