<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Pablo\PooPhp\{
    SimpleClass,
    ExtendClass,
    SimpleReadonlyClass,
    ExampleConstructClass,
};

/**
 * Pode ser feita a instância de um objeto utilizando a instrução new.
 *
 * Sendo possível a seguinte sintaxe:
 * - new ClassName();
 *
 *  - new NameSpace\ClassName();
 *
 * - $className = 'ClassName';
 * - new $className()
 */
$myClass = new SimpleClass;

dump($myClass);
//Exemplo utilizando a função anônima atribuída a uma propriedade.
$myClass->setAttributeUsingAnonymousFunction();
//O atributo var é uma função anônima por isso precisa sem chamado entre parênteses.
//Retorna o valor da função anônima.
dump(($myClass->var)());
//Retorna a função anônima (Closure).
dump($myClass->var);

$className = 'Pablo\PooPhp\SimpleClass';
$instance = new $className;

dump($instance);

/**
 * Apartir do PHP 8.0.0, é possível utilizar o new com expressões arbitrárias.
 *
 * Segue o exemplo de expressões arbitrárias válidas que produzem um nome de classe.
 */
function getClassName(): string
{
    return 'Pablo\PooPhp\SimpleClass';
}

dump(new (getClassName()));
dump(new ('Pablo\PooPhp\Simple' . 'Class'));
dump(new (SimpleClass::class));

$simpleClassObj1 = new SimpleClass();
// Usando a variável que contém o objeto
$simpleClassObj2 = new $simpleClassObj1();
dump($simpleClassObj1 !== $simpleClassObj2);

// Usando o método da classe
dump(SimpleClass::getNewStatic() instanceof SimpleClass);

// Usando o método através da classe filha
dump(ExtendClass::getNewStatic() instanceof ExtendClass);
// Será vai ser o retorno? Qual o motivo?
dump(ExtendClass::getNewSelf() instanceof ExtendClass);

$instanceSimple = new SimpleClass();
dump($instanceSimple->foo(), ($instanceSimple->bar)());

$instanceExtend = new ExtendClass();
dump($instanceExtend->foo(), ($instanceExtend->bar)());

/**
 * A partir do PHP 8.0.0, é possível utilizar o operador de nullsafe.
 * Isso evita que um erro seja lançado quando se tenta acessar uma propriedade ou método de um objeto nulo.
 *
 * Economiza a utilização de condicionais para verificar se o objeto é nulo.
 */
$teste = null;
dump($teste?->foo());

$testePropertyReadOnly = new SimpleReadonlyClass(10, new stdClass);
dump($testePropertyReadOnly->number);

//Fatal error: Uncaught Error: Cannot write to a readonly property

//Porque isso gera um erro fatal?
// $testePropertyReadOnly->setNumber(20);
// $testePropertyReadOnly->number = 20;

//Porque isso não gera um erro fatal?
$testePropertyReadOnly->obj->foo = 'Foo';
dump($testePropertyReadOnly->obj);

dump($instanceSimple->getConstante());
dump($instanceExtend->getConstante());

dump(ExampleConstructClass::fromBasicData('BAR', 30));
dump(ExampleConstructClass::fromJson(json_encode(['owner' => 'BAZ', 'age' => 1])));
