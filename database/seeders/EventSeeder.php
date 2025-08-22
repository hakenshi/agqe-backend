<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'name' => 'PROIBIDO PROIBIR: Roda de Conversa sobre HIV + Festa',
                'slug' => 'proibido-proibir-roda-de-conversa-sobre-hiv-festa',
                'cover_image' => 'images/event/pp_baner.jpeg',
                'event_type' => 'event',
                'date' => '2020-03-21',
                'starting_time' => '16:00',
                'ending_time' => '23:00',
                'location' => 'Casa Pagú, São João da Boa Vista',
                'markdown' => 'A Casa Pagú, no dia 21 de Março de 2020, iniciou um novo ciclo de eventos. A novidade é que, a partir desta data, nossas festas vieram acompanhadas de nossos ideais, mostrando o mundo que acreditamos ser possível, livre de preconceitos e rigidez.

O primeiro evento desta nova fase foi o PROIBIDO PROIBIR, uma roda de conversa sobre HIV com convidados mais que especiais: Jenniffer Besse (Podcast 1Ligação) recebeu David Oliveira para compartilhar sua experiência em um bate-papo lindo, com muita realidade sobre o HIV no Brasil.

Recebemos também Chrysthopher Dekay (Assessor de Políticas para a Diversidade), representando a Associação Grupo Quatro Estações, nossa apoiadora, com informações sobre a nossa região, prevenção, distribuição de material preventivo e muito mais!

A Festa: Dessa vez, a festa foi regada pelo melhor da discotecagem paulistana do pessoal da casa feminista Presidenta Bar, na Augusta.
- DJ residente do Presidenta Bar, Camila Possolo, trazendo o melhor do punk feminista e música indie.
- DJ Renato Mutt agitando com muito garage, post-punk revival e new punk.
- DJ Jennifer Besse representando a cena das Brasilidades.

A ideia foi que as pessoas se sentissem à vontade para participar e tirar suas dúvidas, num ambiente descontraído e acolhedor, porque cremos que todos temos espaço de fala e pertencimento.',
            ],
            [
                'name' => '12ª Parada do Orgulho da Diversidade de São João da Boa Vista',
                'slug' => '12-parada-orgulho-diversidade-sao-joao-da-boa-vista',
                'cover_image' => 'images/event/e1.jpg',
                'event_type' => 'event',
                'date' => '2020-07-19',
                'starting_time' => '13:00',
                'ending_time' => '18:00',
                'location' => 'Largo da Estação Ferroviária, São João da Boa Vista',
                'markdown' => 'A 12ª edição da Parada do Orgulho da Diversidade chegou mais colorida, empoderada, renovada e com muitas novidades! Devido ao contexto da época (Pandemia COVID-19), o formato e atrações foram adaptados.

Apresentação: Judy Rainbow e Convidada Especial.
Apoio: Prefeitura Municipal de São João da Boa Vista, Departamento Municipal de Cultura, Departamento Municipal de Saúde.',
            ],
            [
                'name' => '11ª Parada do Orgulho da Diversidade',
                'slug' => '11-parada-orgulho-diversidade',
                'cover_image' => 'images/parada11/1.jpg',
                'event_type' => 'gallery',
                'date' => '2019-07-21',
                'starting_time' => '13:00',
                'ending_time' => '18:00',
                'location' => 'São João da Boa Vista',
                'markdown' => '11ª Parada do Orgulho da Diversidade. Tema: "Todos Podem ser Frida."',
            ],
        ];

        foreach ($events as $eventData) {
            Event::create($eventData);
        }
    }
}