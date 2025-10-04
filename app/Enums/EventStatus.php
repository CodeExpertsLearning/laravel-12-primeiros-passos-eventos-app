<?php

namespace App\Enums;

enum EventStatus: string
{
    case ACTIVE = 'ACTIVE';
    case DRAFT  = 'DRAFT';
    case INACTIVE  = 'INACTIVE';

    public function label()
    {
        return match($this)
        {
            self::ACTIVE => 'ativo',
            self::INACTIVE => 'inativo',
            self::DRAFT => 'rascunho'
        };
    }

    public function color()
    {
        return match($this)
        {
            self::ACTIVE => 'bg-green-400 text-green-900',
            self::INACTIVE => 'bg-red-400 text-red-900',
            self::DRAFT => 'bg-yellow-400 text-yellow-900'
        };
    }
}
