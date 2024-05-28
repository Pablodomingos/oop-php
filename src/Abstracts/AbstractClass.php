<?php

declare(strict_types=1);

namespace Pablo\PooPhp\Abstracts;

use Pablo\PooPhp\Interfaces\{
    InterfaceFromAbstractClass,
    InterfaceTest
};

/**
 * Classes definidas como abstratas não podem ser instanciadas, e qualquer
 * classe que contenha ao menos um método abstrato também deve ser abstrata.
 * 
 * Quando herdando de uma classe abstrata, todos os métodos marcados como abstratos
 * da classe herdada precisam ser definidos na classe implementante.
 */
abstract class AbstractClass implements InterfaceFromAbstractClass, InterfaceTest
{
    private const NAME = 'Abstract class name';
    protected float $percentage = 0.06;

    // Forçar a classe que estender AbstractClass a implementar o método.
    abstract public function getValueDiscounted(): float;

    // Método comum
    public function getName(): string
    {
        return static::NAME;
    }

    public function getVersion(): string
    {
        return static::VERSION;
    }
}
