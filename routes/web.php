<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'Desenvolvida por' => "Felipe Kafka Dias",
        'Descrição' => 'API Associacao Grupo Quatro Estacoes',
        'Versão' => '1.0',
        'Github' => ''
    ]);
});
