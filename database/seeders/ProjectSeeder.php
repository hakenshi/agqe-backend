<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Projetos reais baseados no schema Drizzle
        $projects = [
            [
                'name' => 'Revitalização da Praça Central',
                'slug' => 'revitalizacao-praca-central',
                'cover_image' => 'https://picsum.photos/800/600?random=5',
                'project_type' => 'social',
                'status' => 'active',
                'responsibles' => 'João Pedro G. B. de Oliveira, Wellington Ambrozio Jacó',
                'location' => 'Praça Central das Quatro Estações',
                'date' => '2024-01-15',
                'starting_time' => '08:00',
                'ending_time' => '17:00',
                'markdown' => 'Projeto de revitalização da praça central com novo paisagismo e equipamentos de lazer para a comunidade.',
            ],
            [
                'name' => 'Programa de Educação Ambiental',
                'slug' => 'programa-educacao-ambiental',
                'cover_image' => 'https://picsum.photos/800/600?random=6',
                'project_type' => 'environmental',
                'status' => 'active',
                'responsibles' => 'Chrysthopher Eluís Dekay',
                'location' => 'Escolas do bairro',
                'date' => '2024-03-01',
                'starting_time' => '14:00',
                'ending_time' => '16:00',
                'markdown' => 'Programa de conscientização ambiental nas escolas locais com atividades práticas e educativas.',
            ],
            [
                'name' => 'Campanha de Arborização 2024',
                'slug' => 'campanha-arborizacao-2024',
                'cover_image' => 'https://picsum.photos/800/600?random=7',
                'project_type' => 'environmental',
                'status' => 'completed',
                'responsibles' => 'Wellington Ambrozio Jacó, Alessandra Windson Francis',
                'location' => 'Ruas do bairro Quatro Estações',
                'date' => '2024-06-15',
                'starting_time' => '07:00',
                'ending_time' => '12:00',
                'markdown' => 'Campanha que resultou no plantio de 200 árvores nas ruas do bairro, melhorando o meio ambiente local.',
            ],
            [
                'name' => 'Curso de Informática para Idosos',
                'slug' => 'curso-informatica-idosos',
                'cover_image' => 'https://picsum.photos/800/600?random=8',
                'project_type' => 'educational',
                'status' => 'completed',
                'responsibles' => 'Luís Felipe Colósimo',
                'location' => 'Centro Comunitário',
                'date' => '2023-08-01',
                'starting_time' => '14:00',
                'ending_time' => '16:00',
                'markdown' => 'Curso básico de informática que atendeu 30 idosos da comunidade, promovendo inclusão digital.',
            ],
            [
                'name' => 'Festival Cultural LGBT+',
                'slug' => 'festival-cultural-lgbt',
                'cover_image' => 'https://picsum.photos/800/600?random=9',
                'project_type' => 'cultural',
                'status' => 'planning',
                'responsibles' => 'Ettore Yazbeck, Pedro Alves, Amanda Domingues',
                'location' => 'Praça da Estação',
                'date' => '2025-06-28',
                'starting_time' => '15:00',
                'ending_time' => '22:00',
                'markdown' => 'Festival cultural com apresentações artísticas, palestras e atividades de conscientização sobre diversidade.',
            ],
            [
                'name' => 'Programa de Saúde Mental LGBT+',
                'slug' => 'programa-saude-mental-lgbt',
                'cover_image' => 'https://picsum.photos/800/600?random=10',
                'project_type' => 'health',
                'status' => 'active',
                'responsibles' => 'Patricia Maria M. T. Mollo, Mitchell Willyans R.',
                'location' => 'Centro de Saúde Municipal',
                'date' => '2024-02-01',
                'starting_time' => '08:00',
                'ending_time' => '17:00',
                'markdown' => 'Programa de apoio psicológico e acompanhamento em saúde mental para a comunidade LGBT+.',
            ],
        ];

        foreach ($projects as $projectData) {
            Project::create($projectData);
        }

        // Projetos aleatórios adicionais
        Project::factory(4)->create();
    }
}