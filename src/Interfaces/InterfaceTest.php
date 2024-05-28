<?php

declare(strict_types=1);

namespace Pablo\PooPhp\Interfaces;

interface InterfaceTest
{
    public const VERSION_TEST = '1.1.0';
    public function getVersion(): string;
}
