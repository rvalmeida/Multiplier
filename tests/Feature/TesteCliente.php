<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Cliente;



class TesteCliente extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
 
        $cliente = new Cliente([
            'nome_fantasia' => 'Empresa ABC',
            'cnpj' => '12.345.678/0001-90',
            'endereco' => 'Rua Principal, 123',
            'cidade' => 'Cidade',
            'estado' => 'UF',
            'pais' => 'Brasil',
            'telefone' => '(11) 1234-5678',
            'email' => 'contato@empresa.com',
            'area_de_atuacao' => 'Tecnologia',
            'quadro_societario' => 'Sócio 1, Sócio 2',
        ]);

        $this->assertEquals('Empresa ABC', $cliente->nome_fantasia);
        $this->assertEquals('12.345.678/0001-90', $cliente->cnpj);
        $this->assertEquals('Rua Principal, 123', $cliente->endereco);
        $this->assertEquals('Cidade', $cliente->cidade);
        $this->assertEquals('UF', $cliente->estado);
        $this->assertEquals('Brasil', $cliente->pais);
        $this->assertEquals('(11) 1234-5678', $cliente->telefone);
        $this->assertEquals('contato@empresa.com', $cliente->email);
        $this->assertEquals('Tecnologia', $cliente->area_de_atuacao);
        $this->assertEquals('Sócio 1, Sócio 2', $cliente->quadro_societario);
    }
}
