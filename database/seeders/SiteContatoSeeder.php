<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\SiteContato;
use Carbon\Factory;
use Database\Factories\SiteContatoFactory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $contato = new SiteContato();
        // $contato->nome = 'Sistema SG';
        // $contato->telefone = '(11) 99876-5644';
        // $contato->email = 'contato@sg.com.br';
        // $contato->motivo_contato = '3';
        // $contato->mensagem = 'Oi, quero te ver';
        // $contato->save();

        \App\Models\SiteContato::factory()->count(100)->create();
    }
}
