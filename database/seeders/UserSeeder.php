<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membros reais da AGQE
        $users = [
            [
                'cpf' => '492.596.328-70',
                'first_name' => 'Felipe',
                'second_name' => 'Kafka Dias',
                'photo' => 'images/volunteer/felipe-kafka-dias.png',
                'occupation' => 'Administrator',
                'password' => Hash::make('123'),
                'birth_date' => '1970-01-01',
                'joined_at' => now()->format('Y-m-d'),
                'color' => 'black',
            ],
            [
                'cpf' => '123.456.789-00',
                'first_name' => 'João Pedro',
                'second_name' => 'G. B. de Oliveira',
                'photo' => 'images/volunteer/JoaoPedro.jpg',
                'occupation' => 'Presidente',
                'password' => Hash::make('1990-05-15'),
                'birth_date' => '1990-05-15',
                'joined_at' => now()->format('Y-m-d'),
                'color' => 'pink',
            ],
            [
                'cpf' => '234.567.890-11',
                'first_name' => 'Wellington',
                'second_name' => 'Ambrozio Jacó',
                'photo' => 'images/volunteer/Wellington.jpg',
                'occupation' => 'Vice-Presidente',
                'password' => Hash::make('1988-11-02'),
                'birth_date' => '1988-11-02',
                'joined_at' => now()->format('Y-m-d'),
                'color' => 'purple',
            ],
            [
                'cpf' => '345.678.901-22',
                'first_name' => 'Chrysthopher',
                'second_name' => 'Eluís Dekay',
                'photo' => 'images/volunteer/Chrysthopher.jpg',
                'occupation' => 'Assessor de Políticas',
                'password' => Hash::make('1992-07-20'),
                'birth_date' => '1992-07-20',
                'joined_at' => now()->format('Y-m-d'),
                'color' => 'blue',
            ],
            [
                'cpf' => '456.789.012-33',
                'first_name' => 'Patricia',
                'second_name' => 'Maria M. T. Mollo',
                'photo' => 'images/volunteer/Patricia.jpg',
                'occupation' => 'Advogada',
                'password' => Hash::make('1985-03-10'),
                'birth_date' => '1985-03-10',
                'joined_at' => now()->format('Y-m-d'),
                'color' => 'teal',
            ],
            [
                'cpf' => '567.890.123-44',
                'first_name' => 'Alessandra',
                'second_name' => 'Windson Francis',
                'photo' => 'images/volunteer/Alessandra.jpg',
                'occupation' => 'Coordenadora Trans',
                'password' => Hash::make('1993-12-01'),
                'birth_date' => '1993-12-01',
                'joined_at' => now()->format('Y-m-d'),
                'color' => 'red',
            ],
            [
                'cpf' => '678.901.234-55',
                'first_name' => 'Ettore',
                'second_name' => 'Yazbeck',
                'photo' => 'images/volunteer/Ettore.jpg',
                'occupation' => 'Coordenador de Eventos',
                'password' => Hash::make('1987-09-25'),
                'birth_date' => '1987-09-25',
                'joined_at' => now()->format('Y-m-d'),
                'color' => 'indigo',
            ],
            [
                'cpf' => '789.012.345-66',
                'first_name' => 'Pedro',
                'second_name' => 'Alves',
                'photo' => 'images/volunteer/Pedro.jpg',
                'occupation' => 'Coordenador de Eventos',
                'password' => Hash::make('1991-06-30'),
                'birth_date' => '1991-06-30',
                'joined_at' => now()->format('Y-m-d'),
                'color' => 'yellow',
            ],
            [
                'cpf' => '890.123.456-77',
                'first_name' => 'Wellington',
                'second_name' => 'Freitas',
                'photo' => 'images/volunteer/WellingtonF.JPG',
                'occupation' => 'Coordenador de Eventos',
                'password' => Hash::make('1989-01-18'),
                'birth_date' => '1989-01-18',
                'joined_at' => now()->format('Y-m-d'),
                'color' => 'green',
            ],
            [
                'cpf' => '901.234.567-88',
                'first_name' => 'Mitchell',
                'second_name' => 'Willyans R.',
                'photo' => 'images/volunteer/Mitchell.jpg',
                'occupation' => 'Assessor de Eventos',
                'password' => Hash::make('1994-08-05'),
                'birth_date' => '1994-08-05',
                'joined_at' => now()->format('Y-m-d'),
                'color' => 'gray',
            ],
            [
                'cpf' => '012.345.678-99',
                'first_name' => 'Lou',
                'second_name' => 'Bruscato',
                'photo' => 'images/volunteer/Luigi..jpg',
                'occupation' => 'Coord. Jovens/Adolesc.',
                'password' => Hash::make('2000-02-14'),
                'birth_date' => '2000-02-14',
                'joined_at' => now()->format('Y-m-d'),
                'color' => 'orange',
            ],
            [
                'cpf' => '111.222.333-00',
                'first_name' => 'Luís Felipe',
                'second_name' => 'Colósimo',
                'photo' => 'images/volunteer/luisFelipe.jpg',
                'occupation' => 'Web Designer',
                'password' => Hash::make('1995-10-22'),
                'birth_date' => '1995-10-22',
                'joined_at' => now()->format('Y-m-d'),
                'color' => 'cyan',
            ],
            [
                'cpf' => '222.333.444-11',
                'first_name' => 'Amanda',
                'second_name' => 'Domingues',
                'photo' => 'images/volunteer/amanda.jpg',
                'occupation' => 'Coord. Ações/Eventos',
                'password' => Hash::make('1996-04-12'),
                'birth_date' => '1996-04-12',
                'joined_at' => now()->format('Y-m-d'),
                'color' => 'lime',
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}