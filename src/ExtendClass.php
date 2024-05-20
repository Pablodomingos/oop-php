<?php

declare(strict_types=1);

namespace Pablo\PooPhp;

use Closure;

class ExtendClass extends SimpleClass
{
    public function __construct(
    ) {
        parent::__construct(Closure::fromCallable([$this, 'bar']));
    }

    /**
     * O método displayVar() é herdado da classe SimpleClass.
     *
     * O método displayVar() foi sobescrito, porém o mesmo não vai acontecer com o método var(),
     * porque ele está definido como final, isso quer dizer que ele pode ser acessado
     * pela classe filha, mas não pode ser sobescrito.
     */
    public function displayVar(): string
    {
        return "Classe Herdeira\n" . parent::displayVar();
    }

    /**
     * Ao sobrescrever o método foo() da classe pai, é possível adicionar novos
     * parâmetros, porém não é possível remover os parâmetros existentes nem alterar os
     * seus tipos e o tipo de retorno.
     *
     * **Aviso**
     * Renomear um parâmetro em uma classe derivada não é uma quebra de assinatura.
     * Entretanto isso é desencorajado porque ocasionará um Error se argumentos nomeados
     * forem utilizados na chamada.
     */
    public function foo(int $num = 1, int $num2 = 2): int
    {
        return $num + $num2;
    }

    /**
     * Note que sobrescrevemos o método bar() da classe pai, porém foi removido seu
     * parâmetro é alterado o tipo de retorno da função.
     * As regras de variância não se aplicam a construtores e métodos privados.
     *
     * @link https://www.php.net/manual/pt_BR/language.oop5.variance.php
     */
    private function bar(): int
    {
        return 1;
    }
}
