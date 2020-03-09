<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert(
            [
                'name' => 'mark',
                'email' => 'markgeffer@hotmail.com',
                'localidade' => 'sao jose',
                'funcao' => 'administrador',
                'password' => '$2y$10$fj0Z0cqZpqM46A44saCS7u0hzivYv/kwXEeR1bjrfIEKQQDOJAYBS'
            ]
        );
    }
}
