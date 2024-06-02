<?php

declare(strict_types=1);

namespace Pablo\PooPhp;

/**
 * Sobrecarga
 * 
 * Sobrecarga em PHP provê recursos para criar dinamicamente propriedades e métodos.
 * Estas entidades dinâmicas são processadas por métodos mágicos fornecendo a uma
 * classe vários tipos de ações.
 * 
 * Os métodos de sobrecarga são invocados ao interagir com propriedades ou métodos
 * que não foram declarados ou não são visíveis no escopo corrente. O resto desta
 * seção usará os termos propriedades inacessíveis e métodos inacessíveis para
 * referir-se a esta combinação de declaração e visibilidade.
 * 
 * Todos os métodos de sobrecarga devem ser definidos como public.
 * 
 * - Nenhum dos argumentos dos métodos mágicos podem ser passados por referência.
 * 
 * - A interpretação do PHP de sobrecarga é diferente da maioria das linguagens
 * orientadas a objeto. Sobrecarga, tradicionalmente, provê a habilidade de ter
 * múltiplos métodos com o mesmo nome, mas com quantidades e tipos de argumentos
 * diferentes.
 * 
 * - Na minha opnião não é uma boa utilizar esses métodos, pois podem
 * tornar o código confuso e sujeito a bugs difíceis de serem identificados.
 * Mas se forem utilizados, devem ser mantidos uma documentação clara para
 * ficilitar a compreensão do código por outros desenvolvedores.
 * 
 * @link https://www.php.net/manual/pt_BR/language.oop5.overloading.php
 */
class OverloadingClass
{
        // Overloading not used on declared properties.
        public int $declared = 1;

        // Location for overloaded data.
        private array $data = [];
    
        // Overloading only used on this when accessed outside the class.
        private int $hidden = 2;
    
        /**
         * __set() é executado ao escrever dados em propriedades inacessíveis
         * (private ou protected) ou propriedades inexistentes.
         * 
         * - O valor de retorno de __set() é ignorado por causa da forma que o PHP
         * processa o operador de atribuição. Similarmente, o método __get()
         * nunca é chamado em atribuições encadeadas como essa:
         *
         * $a = $obj->b = 2;
         */
        public function __set($name, $value): void
        {
            echo "Setting '$name' to '$value'\n";
            $this->data[$name] = $value;
        }
    
        /**
         * __get() é utilizado para ler dados de propriedades inacessíveis
         * (private ou protected) ou propriedades inexistentes.
         */
        public function __get($name): mixed
        {
            echo "Getting '$name'\n";
            if (array_key_exists($name, $this->data)) {
                return $this->data[$name];
            }
    
            $trace = debug_backtrace();
            trigger_error(
                'Undefined property via __get(): ' . $name .
                ' in ' . $trace[0]['file'] .
                ' on line ' . $trace[0]['line'],
                E_USER_NOTICE
            );

            return null;
        }
    
        /**
         * __isset() é disparado ao chamar a função isset() ou empty() em
         * propriedades inacessíveis (private ou protected) ou
         * propriedades inexistentes.
         */
        public function __isset($name): bool
        {
            echo "Is '$name' set?\n";
            return isset($this->data[$name]);
        }
    
        /**
         * __unset() é invocado ao usar o construtor unset() em propriedades
         * inacessíveis (private ou protected) ou propriedades inexistentes.
         */
        public function __unset($name): void
        {
            echo "Unsetting '$name'\n";
            unset($this->data[$name]);
        }
    
        // Not a magic method, just here for example.
        public function getHidden(): int
        {
            return $this->hidden;
        }

        public function getData(): array
        {
            return $this->data;
        }

        private static function runTest(string $foo, string $bar): void
        {
            echo "Running test $foo and $bar\n";
        }

        public function __call($name, $arguments)
        {
            // Utilizar o método call_user_func() ou dinamicamente, da no mesmo!
            // call_user_func([$this, $name], ...$arguments);
            // $this->$name(...$arguments);

            // Note: value of $name is case sensitive.
            echo "Calling object method '$name' "
                 . implode(', ', $arguments). "\n";
        }
    
        public static function __callStatic($name, $arguments)
        {
            // Note: value of $name is case sensitive.
            echo "Calling static method '$name' "
                 . implode(', ', $arguments). "\n";
        }
}