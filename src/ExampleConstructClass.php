<?php

declare(strict_types=1);

namespace Pablo\PooPhp;

class ExampleConstructClass
{
    /**
     * O construtor pode ser private ou protected para evitar que ele seja
     * chamado externamente. Nesses casos apenas um construtor estático será
     * capaz de instanciar a classe. Por eles estarem nas mesma definição de classe,
     * os métodos estáticos são capazes de instanciar o objeto, mesmo em uma
     * instância diferente. O construtor privado é opcional e pode não fazer
     * sentido em todos os casos.
     */
    private function __construct(
        private string $owner,
        private int $age
    ){}

    /**
     * Métodos de criação estáticos
     * 
     * O PHP suporta apenas um único construtor por classe.
     * Em alguns casos pode ser desejável de permitir a um objeto ser construído
     * de maneiras diferentes, a partir de argumentos diferentes. O método
     * recomendado para realizar isso é através de métodos estáticos, utilizados
     * como empacotadores do construtor.
     * 
     * - O método fromBasicData() cria uma instância da classe com os exatos
     * parâmetros do construtor e retorna o resultado.
     * 
     * - O método fromJson() cria uma instância da classe a partir de uma string
     * JSON fazendo um pré-processamento para obter os dados no formato
     * necessário para passar no construtor e retorna o resultado.
     * 
     * A palavra chave static é convertida para no nome da classe onde o
     * código reside. Nesse caso a classe ExampleConstructClass.
     */

    public static function fromBasicData(string $owner, int $age): static
    {
        return new static($owner, $age);
    }

    public static function fromJson(string $json): static
    {
        $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        return new static($data['owner'], $data['age']);
    }

    /**
     * Assim como os construtores, os destrutores da classe pai não serão chamados
     * implicitamente pelo PHP. Para executar o destrutor pai, deve-se fazer uma
     * chamada explícita a parent::__destruct() no corpo do destrutor.
     * Assim como construtores, uma classe filha pode herdar o destrutor caso não implemente um.
     */
    public function __destruct()
    {
        echo "Objeto destruído " . __CLASS__ . "\n";
    }
}
