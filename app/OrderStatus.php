<?php

namespace App;

enum OrderStatus: string
{
    case Draft = 'draft';
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

    public function name(): string
    {
        return ucfirst($this->value);
    }

    public function color(): string
    {
        return match($this) {
            self::Pending => 'warning',
            self::Approved => 'success',
            self::Canceled => 'danger',
            self::Shipped => 'primary',
            self::Arrived => 'gray',
            default => '',
        };
    }

}
