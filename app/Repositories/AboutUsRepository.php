<?php

namespace App\Repositories;

use App\Models\AboutUs;

/**
 * Class AboutUsRepository
 */
class AboutUsRepository extends BaseRepository
{
    public $fieldSearchable = [
        'key',
        'value',
    ];

    /**
     * {@inheritDoc}
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * {@inheritDoc}
     */
    public function model()
    {
        return AboutUs::class;
    }

    /**
     * @param  array  $input
     * @return void
     */
    public function updateData($input)
    {
        $menu_title_lang = [
            'ar' => $input['menu_title_ar'] ?? '_',
            'tr' => $input['menu_title_tr'] ?? '_',
        ];
        $title_lang = [
            'ar' => $input['title_ar'] ?? '_',
            'tr' => $input['title_tr'] ?? '_',
        ];
        $short_description_lang = [
            'ar' => $input['short_description_ar'] ?? '_',
            'tr' => $input['short_description_tr'] ?? '_',
        ];
        $input['menu_title_lang'] = json_encode($menu_title_lang); 
        $input['title_lang'] = json_encode($title_lang); 
        $input['short_description_lang'] = json_encode($short_description_lang); 
        unset($input['menu_title_ar'], $input['menu_title_tr'], $input['title_ar'], $input['title_tr'], $input['short_description_ar'], $input['short_description_tr']);

        foreach ($input as $key => $value) {
            /** @var AboutUs $about_us */
            $about_us = AboutUs::where('key', $key)->first();
            if (! $about_us) {
                continue;
            }
            if (in_array($key, ['menu_bg_image', 'image_1', 'image_2'])) {
                $this->fileUpload($about_us, $value);
                continue;
            }
            $about_us->update(['value' => $value]);
        }
    }

    /**
     * @param $about_us
     * @param $file
     */
    public function fileUpload($about_us, $file)
    {
        $about_us->clearMediaCollection(AboutUs::ABOUT_US_PATH);
        $media = $about_us->addMedia($file)->toMediaCollection(AboutUs::ABOUT_US_PATH, config('app.media_disc'));
        $about_us->update(['value' => $media->getFullUrl()]);
    }
}
