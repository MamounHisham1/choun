<?php

namespace App;

enum PaymentStatus: string
{
    case Pending = 'Pending';
    case Canceled = 'Canceled';
    case Completed = 'Completed';
}
