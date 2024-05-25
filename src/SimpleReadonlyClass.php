<?php

declare(strict_types=1);

namespace Pablo\PooPhp;

/**
 * A partir do PHP 8.2.0 é possível declarar classes como sendo readonly,
 * isso irá acrescentar o modificador de acesso readonly a todas as propriedades desta classe.
 *
 * Utilizar a propriedade readonly garante que não será possível a criação de propriedades
 * dinâmicas em tempo de execução.
 *
 * Não pode ser declarado propriedades estáticas ou sem tipos.
 *
 * A classe readonly só pode ser estendida se, e somente se, a classe filha também for
 * uma classe readonly.
 * 
 * Entretanto, propriedades somente leitura não proíbem mutação. Objetos ou recursos
 * armazenados em propriedades somente leitura ainda podem ser modificados
 * internamente.
 */
readonly class SimpleReadonlyClass
{
    //TODAS AS PROPRIEDADES DESSA CLASSE SÃO READONLY.

    //Essas declarações vão gerar um erro.
    // public $var;
    // public static string $var;

    public string $var;

    
    /**
     * A partir do PHP 8.1.0, uma propriedade pode ser declarada somente leitura,
     * prvinindo modificação da propriedade após a sua inicialização.
     * 
     * **Aviso**
     * - O modificador readonly somente pode ser aplicado a propriedade tipada,
     * não sendo possível aplicar a propriedades sem um tipo especifico.
     *
     * - Propriedades estáticas não são suportadas.
     * 
     * - Uma propriedade somente leitura somente pode ser inicializada uma única vez,
     * e somente do escopo onde ela foi declarada. Quaisquer outras modificações da
     * propriedade resultam em um Error.
     */
    public int $number;

    /**
     * Fatal error: Readonly property Test::$prop cannot have default value
     * 
     * Não pode ser definido um valor default para propriedades somente leitura.
     * porque uma propriedade com um valor default é essenciamente uma constante,
     * e por isso não tem propósito.
     */
    // int $prop = 42;

    public function __construct(
        int $number = 0,
        /**
         * A partir do PHP 8.0.0 é permitido fazer promoções de propriedades(Property Promotion),
         * que é uma forma de simplificar a declaração de propriedades e construtores.
         * 
         * O corpo do construtor pode está vazio ao definir as propriedades por meio
         * da promoção de proriedades, mas se houver alguma coisa no corpo do construtor,
         * será executado após a inicialização das propriedades.
         * 
         * Nem todos os argumentos são promovidos. É possível misturar os argumentos
         * promovidos e não promovidos em qualquer ordem. Argumentos promovidos
         * não têm impacto no código chamador do construtor.
         * 
         * **Aviso**
         * Propriedades de objeto não podem ser do tipo callable dado uma
         * ambiguidade que poderia introduzir. Argumentos promovidos, portanto,
         * não podem ser do tipo callable. 
         */
        public object $obj,
        //Não é permitido modificar a propriedade array após a sua inicialização.
        public array $array = [],
    ) {
        //Essa modificação é permitida!
        $this->number = $number;
    }

    public function setNumber(int $number): void
    {
        //Essa modificação não é permitida!
        $this->number = $number;
    }
}
