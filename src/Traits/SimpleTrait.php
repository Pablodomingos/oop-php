<?php

declare(strict_types=1);

namespace Pablo\PooPhp\Traits;

/**
 * Traits são um mecanismo para reúso de código em linguagens de herança simples
 * como o PHP. A intenção de uma Trait é reduzir algumas limitações de herança
 * simples permitindo que um desenvolvedor reutilize livremente conjuntos de
 * métodos em várias classes independentes habitando em diferentes hierarquias
 * de classe. A semântica da combinação de Traits e classes é definida de uma
 * maneira que reduz a complexidade, e evita os problemas típicos associados
 * com herança múltipla e Mixins.
 * 
 * Uma Trait é similar a uma classe, mas destina-se apenas a agrupar funcionalidade
 * de uma forma refinada e consistente. Não é possível instanciar uma Trait por
 * si só. Ela é uma adição à herança tradicional e permite composição e
 * comportamento horizontais; isto é, a aplicação de membros de classe sem
 * exigir herança.
 * 
 * Precendência:
 * Um membro herdado de uma classe base é substituído por um membro inserido
 * por uma Trait. Na ordem de precedência, os membros da classe atual substituem
 * os métodos da Trait, que por sua vez substituem os métodos herdados.
 * 
 * @link https://www.php.net/manual/pt_BR/language.oop5.traits.php
 */
trait SimpleTrait
{
    /**
     * Traits podem, a partir do PHP 8.2.0, também definir constantes.
     */
    final public const FLAG = 'Trait flag';

    /**
     * Traits podem definir variáveis estáticas, métodos estáticos e propriedades
     * estáticas.
     *
     * Nota:
     * A partir do PHP 8.1.0, chamar um método estático, ou acessar uma propriedade
     * estática diretamente em uma Trait foi descontinuado. Métodos estáticos e
     * propriedades somente devem ser acessados em uma classe utilizando a Trait.
     */
    public static string $traitName = 'SimpleTrait';

    /**
     * Traits suportam o uso de métodos abstratos para impor requisitos sobre uma
     * classe expositora. Métodos públicos, protegidos e privados são suportados.
     * Antes do PHP 8.0.0, apenas métodos abstratos públicos e protegidos eram
     * suportados.
     */
    abstract public function test(): array;

    public function getValueDiscounted(float $value = 0): float
    {
        return  $value - $this->percentage * $value;
    }
}
