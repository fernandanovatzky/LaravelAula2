<?php


use Illuminate\Database\Seeder;
use App\Mensagem;
class mensagensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        Mensagem::create([
            'titulo' => 'Prova de Matemática',
            'autor' => 'Prova sobre números imaginários',
            'texto' => '2018-09-01 13:15:00'
        ]);

        Mensagem::create([
            'titulo' => 'Desenvolver o trabalho de Tópicos Especiais',
            'autor' => 'Implementar o trabalho final da disciplina',
            'texto' => '2018-10-01 13:15:00'
        ]);

    }
}
