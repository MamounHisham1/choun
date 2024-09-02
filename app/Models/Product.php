<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute as AttributeCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasSlug;

    protected $guarded = [];
    protected $with = ['media'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): AttributeCast
    {
        return AttributeCast::get(fn() => $this->getMedia('product-images'));
    }

    public function imageUrl(): AttributeCast
    {
        return AttributeCast::get(fn() => $this->getMedia('product-images')->first()?->getUrl() ?? 'https://random.imagecdn.app/261/261');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)
            ->withPivot('values')
            ->withCasts([
                'values' => 'json'
            ]);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}