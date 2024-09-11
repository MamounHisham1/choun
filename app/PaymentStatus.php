<?php

namespace App;

enum PaymentStatus: string
{
    case Pending = 'pending';
    case Completed = 'completed';
    case Canceled = 'canceled';

    public static function getStatuses()    
    {
        return collect(self::cases())
            ->mapWithKeys(fn($case) => [$case->value => $case->name]);
    }

    public function name()
    {
        return ucfirst($this->value);
    }
}
