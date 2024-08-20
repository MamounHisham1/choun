<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    protected $fillable = ['key', 'value', 'json_value'];
    public function casts(): array
    {
        return [
            'json_value' => 'json',
        ];
    }

    public static function set(string $key, array $value) 
    {
        HomeSetting::updateOrCreate(['key' => $key], [
            'json_value' => $value,
        ]);
    }
}
