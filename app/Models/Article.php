<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    use HasFactory;
    use HasSlug;
    use SoftDeletes;
    protected $fillable = ['title', 'content', 'image', 'image_mime', 'image_size', 'hidden', 'category_id', 'created_by', 'updated_by'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
