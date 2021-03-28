<?php

use Illuminate\Database\Seeder;
use App\sitecontato;

class sitecontatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $contato = new sitecontato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(11)9999-8888';
        $contato->email = 'sistema@gmail.com';
        $contato->motivo_contato = '1';
        $contato->mensagem = 'Seja bem vindo ao sistema Super Gestão';
        $contato->save();
        */
        factory(sitecontatoFactory::class,100)->create();
    }
}
