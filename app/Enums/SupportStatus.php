<?php

namespace App\Enums;

enum SupportStatus: string
{
    case A = "Open";
    case C = "Closed";
    case P = "Pendente";

    public static function fromValue(string $status)
    {
        foreach (self::cases() as $item) {
            if ($item->name === $status) {
                return $item->value;
            }
        }
        throw new \ValueError("$status is not valid.");
    }
}
