<?php

declare(strict_types=1);

namespace Pablo\PooPhp;

use Closure;

class SimpleClass
{
    //Declaração da propriedade
    public Closure|string $var = 'a default value';
    public Closure $bar;

    public function __construct(
        Closure $bar = null
    ) {
        $this->bar = $bar instanceof Closure ? $bar : [$this, 'bar'](...);
    }

    /**
     * Isto significa que chamar diretamente uma função anônima atribuída a uma propriedade não é possível.
     * Em vez disso, por exemplo, a propriedade deve primeiro ser atribuída a uma variável.
     * É possível chamar uma propriedade diretamente colocando-a entre parênteses.
     */
    public function setAttributeUsingAnonymousFunction(): void
    {
        $this->var = function () {
            return 'set value using anonymous function';
        };
    }

    /**
     * É possível definir um método com o mesmo nome de uma dentro do mesmo namespace,
     * a sua utilização vai depender do contexto.
     *
     * A partir do PHP 8.1.0, a declaração final pode ser utilizada.
     * Dessa forma utilizando o final, impede que o método seja sobrescrito.
     */
    final public function var(): string
    {
        return 'method';
    }

    /**
     * Declaração do método
     *
     * No PHP 8.0.0, ao chamar métodos não estáticos de uma classe,
     * gera um erro fatal. Nas versões anteriores, o PHP emitia um aviso.
     */
    public function displayVar(): string
    {
        /**
         * O método $this é chamado a partir do contexto de um objeto.
         * $this é uma referência ao objeto chamado.
         */
        return $this->var;
    }

    /**
     * A utilização do método estático cria uma instância da classe a partir do seu
     * contexto, ou seja a partir do objeto que o chamou.
     */
    public static function getNewStatic(): static
    {
        return new static();
    }

    /**
     * Ao chamar o método getNewSelf(), ele retorna uma instância da própria classe
     * onde foi definido.
     */
    public static function getNewSelf(): self
    {
        return new self();
    }

    public function foo(int $num = 5): int
    {
        return $num;
    }

    private function bar(?string $text = 'Olá mundo'): string|null
    {
        return $text;
    }
}
