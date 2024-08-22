<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];
    protected $with = ['media'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): Attribute
    {
        return Attribute::get(fn() => $this->getMedia('product-images'));
    }

    public function imageUrl(): Attribute
    {
        return Attribute::get(fn() => $this->getMedia('product-images')->first()?->getUrl() ?? 'https://random.imagecdn.app/261/261');
    }
}