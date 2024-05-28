<?php

declare(strict_types=1);

namespace Pablo\PooPhp\Abstracts;

use Pablo\PooPhp\Interfaces\{
    InterfaceFromAbstractClass,
    InterfaceTest
};

use Pablo\PooPhp\Traits\{
    ExampleTraitA,
    ExampleTraitB
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
    /**
     * Resolução de Conflitos
     * Se duas Trais inserem dois métodos com o mesmo nome, um erro fatal é gerado,
     * se o conflito não for explicitamente resolvido.
     * 
     * Para resolver conflitos de nomes entre Traits usados na mesma classe,
     * o operador insteadof deve ser usado para escolher exatamente um dos métodos
     * conflitantes.
     * 
     * Como isto permite apenas excluir métodos, o operador as pode ser usado para
     * adicionar um apelido a um dos métodos. Note que o operador as não renomeia
     * o método e também não afeta nenhum outro método.
     */
    use ExampleTraitA, ExampleTraitB {
        ExampleTraitA::smallTalk insteadof ExampleTraitB;
        ExampleTraitB::bigTalk insteadof ExampleTraitA;
        ExampleTraitA::bigTalk as talk;
        /**
         * Mudando a visibilidade do método
         */
        ExampleTraitB::smallTalk as protected small;
    }

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

    public function smallTalkA(): string
    {
        return $this->small();
    }
}
