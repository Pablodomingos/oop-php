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
 */
readonly class SimpleReadonlyClass
{
    //Essas declarações vão gerar um erro.
    // public $var;
    // public static string $var;

    //Essa variável é uma propriedade readonly.
    public string $var;
}
