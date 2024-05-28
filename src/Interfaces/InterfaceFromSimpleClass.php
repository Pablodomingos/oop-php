<?php

declare(strict_types=1);

namespace Pablo\PooPhp\Interfaces;

interface InterfaceFromSimpleClass extends InterfaceFromAbstractClass
{
    public function var(): string;
}
