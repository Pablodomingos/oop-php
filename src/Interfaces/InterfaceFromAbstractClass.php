<?php

declare(strict_types=1);

namespace Pablo\PooPhp\Interfaces;

use Pablo\PooPhp\Abstracts\AbstractClass;

/**
 * Interfaces de objetos permitem a criação de códigos que especificam quais
 * métodos uma classe deve implementar, sem definir como esses métodos serão
 * implementados.
 * 
 * Todos os métodos declarados em uma interface devem ser públicos,
 * essa é a natureza de uma interface.
 * 
 * Na prática, interfaces servem a dois propósitos distintos:
 * - Elas permitem os desenvolvedores de criar objetos de classes diferentes que
 * podem ser substituídos dado que eles implementam a mesma ou as mesmas interfaces.
 * Um exemplo seriam os serviços variados de acesso a banco de dados, vários sistemas
 * de pagamentos, ou estratégias de cache. Implementações diferentes podem ser
 * substituídas sem requerer modificações nos códigos que as usam.
 * 
 * - Para permitir que uma função ou método aceite e opere em um parâmetro que
 * se molda a uma interface, ao mesmo tempo que não se importa como a funcionalidade
 * é implementada. Estas interfaces são conhecidas como Iterable, Cacheable,
 * Renderable, e assim por diante, e descrevem o comportamento significativo.
 * 
 * Interfaces podem definir métodos mágicos para exigir que as classes
 * implementantes também implementem esses métodos.
 * 
 * Nota:
 * - Interfaces podem ser estendidas como as classes, usando o operador extends.
 * - Uma classe pode implementar várias interfaces que declarem um método com o
 * mesmo nome. Neste caso, a implementação precisa seguir as regras de
 * compatibilidade de assinaturas de todas as interfaces. É possível assim
 * aplicar covariância e contravariância.
 * 
 * @link https://www.php.net/manual/pt_BR/language.oop5.interfaces.php
 */
interface InterfaceFromAbstractClass
{
    public const VERSION = '1.0.0';
    public function getValueDiscounted(): float;
    public function getName(): string;
    public function getVersion(): string;
}
