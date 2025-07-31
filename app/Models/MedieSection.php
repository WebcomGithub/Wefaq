<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Class Brand
 */
class MedieSection extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public const PATH = 'image_url';

    /**
     * @var string[]
     */
    public static $rules = [
        'name' => 'required|unique:brands|max:30',
        'type' => 'required|in:image,video',
        'video_url' => 'nullable',
        'image' => 'nullable|mimes:jpg,jpeg,png',
    ];


    protected $table = 'medie_section';

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'type', 'video_url'];

    protected $casts = ['name' => 'string'];

    protected $with = ['media'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(self::PATH)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('front_landing/images/maxton.png');
    }

    /**
     * @return HasMany
     */
    public function brands()
    {
        return $this->hasMany(Event::class);
    }
}
