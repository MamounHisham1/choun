<?php

namespace App;

enum OrderStatus: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Shipped = 'shipped';
    case Arrived = 'arrived';
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

    public function color()
    {
        return match($this) {
            self::Pending => 'primary',
            self::Approved => 'info',
            self::Canceled => 'danger',
            self::Shipped => 'warning',
            self::Arrived => 'success',
        };
    }

}
