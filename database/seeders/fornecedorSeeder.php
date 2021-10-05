<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class fornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // INstânciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fada madrinha';
        $fornecedor->site = 'FadaeJorge.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'fadamadrinha@gmail.com';
        $fornecedor->save();

        // O método create (atenção ao atributo fillable da classe)
        Fornecedor::create([
            'nome' => romance da Telecena',
            'site' => romanceTelecena.com',
            'uf' => 'SP',
            'email' => 'romanceTelecena@gmail.com'
        ]);

        // insert
        // DB::table('fornecedores')->insert([
        //     'nome' => 'Renato',
        //     'site' => 'Renato.com',
        //     'uf' => 'SP',
        //     'email' => 'renato@gmail.com'
        // ]);

    }
}
