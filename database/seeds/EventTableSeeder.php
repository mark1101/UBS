<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('events')->insert(
            [
                'title' => 'Reunião',
                'start' => '2020/03/12 21:30:00',
                'end' => '2020/03/12 23:00:00',
                'color' => '#c40233',
                'description' => 'Reunião com o clientes'
            ],
            [
                'title' => 'Levar a escola',
                'start' => '2020/03/11 21:30:00',
                'end' => '2020/03/11 23:00:00',
                'color' => '#c40233',
                'description' => 'levar as criancas'
            ]
        );
    }
}
