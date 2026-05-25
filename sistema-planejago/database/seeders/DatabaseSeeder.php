<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $agora = now();

        DB::table('tipo_lancamentos')->insert([
            ['id' => 1, 'titulo' => 'Despesa', 'descricao' => 'Saídas de dinheiro', 'created_at' => $agora, 'updated_at' => $agora],
            ['id' => 2, 'titulo' => 'Receita', 'descricao' => 'Entradas de dinheiro', 'created_at' => $agora, 'updated_at' => $agora],
        ]);

        DB::table('frequencias')->insert([
            ['id' => 1, 'titulo' => 'Não se repete', 'descricao' => 'Lançamento único', 'created_at' => $agora, 'updated_at' => $agora],
            ['id' => 2, 'titulo' => 'Diariamente', 'descricao' => 'Ocorre todos os dias', 'created_at' => $agora, 'updated_at' => $agora],
            ['id' => 3, 'titulo' => 'Semanalmente', 'descricao' => 'Ocorre toda semana', 'created_at' => $agora, 'updated_at' => $agora],
            ['id' => 4, 'titulo' => 'Mensalmente', 'descricao' => 'Ocorre todo mês', 'created_at' => $agora, 'updated_at' => $agora],
        ]);

        DB::table('categorias')->insert([
            // Categorias de Despesa
            ['id' => 1, 'titulo' => 'Casa', 'descricao' => 'Gastos residenciais', 'tipo_lancamento_id' => 1, 'created_at' => $agora, 'updated_at' => $agora],
            ['id' => 2, 'titulo' => 'Educação', 'descricao' => 'Escola e faculdade', 'tipo_lancamento_id' => 1, 'created_at' => $agora, 'updated_at' => $agora],
            ['id' => 3, 'titulo' => 'Saúde', 'descricao' => 'Plano de saúde e remédios', 'tipo_lancamento_id' => 1, 'created_at' => $agora, 'updated_at' => $agora],
            
            // Categorias de Receita
            ['id' => 4, 'titulo' => 'Salário', 'descricao' => 'Renda principal', 'tipo_lancamento_id' => 2, 'created_at' => $agora, 'updated_at' => $agora],
            ['id' => 5, 'titulo' => 'Investimentos', 'descricao' => 'Rendimentos', 'tipo_lancamento_id' => 2, 'created_at' => $agora, 'updated_at' => $agora],
            ['id' => 6, 'titulo' => 'Empréstimos', 'descricao' => 'Valores tomados', 'tipo_lancamento_id' => 2, 'created_at' => $agora, 'updated_at' => $agora],
        ]);

        $this->call([
            UserSeeder::class,
        ]);
    }
}
