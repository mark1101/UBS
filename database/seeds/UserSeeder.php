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
                'cidade_sede' => 'santa maria do oeste',
                'localidade' => 'sao jose',
                'funcao' => 'administrador',
                'controle_acesso' => '4',
                'password' => '$2y$10$fj0Z0cqZpqM46A44saCS7u0hzivYv/kwXEeR1bjrfIEKQQDOJAYBS',
                'admin' => '0',
                'cpf' => '000.000.000-01',
                'data_nascimento' => '00/00/0000'
            ],
            [
                'name' => 'mark',
                'email' => 'markgeffer@hotmail.com',
                'cidade_sede' => 'santa maria do oeste',
                'localidade' => 'sao jose',
                'funcao' => 'administrador',
                'controle_acesso' => '4',
                'password' => '$2y$10$fj0Z0cqZpqM46A44saCS7u0hzivYv/kwXEeR1bjrfIEKQQDOJAYBS',
                'admin' => '0',
                'cpf' => '000.000.000-01',
                'data_nascimento' => '00/00/0000'
            ]
        );
    }
}
