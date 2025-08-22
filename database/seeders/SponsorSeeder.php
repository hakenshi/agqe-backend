<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    public function run(): void
    {
        $sponsors = [
            ['name' => 'Doritos', 'logo' => 'images/apoio/1.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Burger King', 'logo' => 'images/apoio/2.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'PARADASP', 'logo' => 'images/apoio/3.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Antra', 'logo' => 'images/apoio/4.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'ARTGAY', 'logo' => 'images/apoio/5.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'IBRAT', 'logo' => 'images/apoio/6.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Coord. Política Diversidade Sexual', 'logo' => 'images/apoio/7.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Aliança Nacional LGBTI', 'logo' => 'images/apoio/8.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Grupo Dignidade', 'logo' => 'images/apoio/9.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'REDEGAY', 'logo' => 'images/apoio/10.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Copabacana', 'logo' => 'images/apoio/11.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'CLAC', 'logo' => 'images/apoio/12.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Greenpeace', 'logo' => 'images/apoio/14.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Prefeitura São João', 'logo' => 'images/apoio/15.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Depto. Cultura SJBV', 'logo' => 'images/apoio/16.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Líbero Hotel', 'logo' => 'images/apoio/17.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Mais Orgulho', 'logo' => 'images/apoio/18.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'AGQE', 'logo' => 'images/apoio/19.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'São João Turismo', 'logo' => 'images/apoio/20.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Fly', 'logo' => 'images/apoio/21.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Med 4 You', 'logo' => 'images/apoio/22.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'APEOESP', 'logo' => 'images/apoio/24.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Francielli Delalibera', 'logo' => 'images/apoio/25.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Big Bom Supermercados', 'logo' => 'images/apoio/26.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'F.B Eventos e Cerimonial', 'logo' => 'images/apoio/27.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Unicópias e Impressões', 'logo' => 'images/apoio/28.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Jess Comunicação Visual', 'logo' => 'images/apoio/29.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Grupo Plural', 'logo' => 'images/apoio/30.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Felice Pizzaria', 'logo' => 'images/apoio/31.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'A.W Moda Íntima', 'logo' => 'images/apoio/33.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Brothers Cenografia', 'logo' => 'images/apoio/34.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Long Way Store', 'logo' => 'images/apoio/35.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'SAN', 'logo' => 'images/apoio/36.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Anistia Internacional', 'logo' => 'images/apoio/37.png', 'website' => '', 'sponsoring_since' => now()],
            ['name' => 'Armazém Asgard', 'logo' => 'images/apoio/38.png', 'website' => '', 'sponsoring_since' => now()],
        ];

        foreach ($sponsors as $sponsorData) {
            Sponsor::create($sponsorData);
        }
    }
}