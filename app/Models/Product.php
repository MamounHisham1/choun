<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute as AttributeCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasSlug, Searchable;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $with = ['media'];

    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
            'brand' => $this->brand->name,
            'category' => $this->category->name,
            'category_id' => $this->category->id,
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
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

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function images(): AttributeCast
    {
        return AttributeCast::get(fn() => $this->getMedia('product-images'));
    }

    public function imageUrl(): AttributeCast
    {
        return AttributeCast::get(fn() => $this->getMedia('product-images')
            ->first()
                ?->getUrl() ?? 'https://random.imagecdn.app/261/261');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}