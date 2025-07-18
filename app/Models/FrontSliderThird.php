<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FrontSliderThird extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $table = 'third_sliders';

    const FRONT_SLIDER_IMAGE = 'front_slider_image';

    protected $appends = ['slider_image'];

    protected $with = ['media'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_1',
        'title_2',
        'title_1_lang',
        'title_2_lang',
    ];

    protected $casts = [
        'title_1' => 'string',
        'title_2' => 'string',
        'title_1_lang' => 'array',
        'title_2_lang' => 'array',
    ];

    public static $rules = [
        'title_1' => 'required|max:50',
        'title_2' => 'max:50',
        'image' => 'required',
    ];

    /**
     * @return string
     */
    public function getSliderImageAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::FRONT_SLIDER_IMAGE)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('front_landing/images/news-1.png');
    }
}
