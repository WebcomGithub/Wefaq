<?php

namespace App\Repositories;

use App\Models\ThirdVideoSection;

/**
 * Class ThirdVideoSectionRepository
 */
class ThirdVideoSectionRepository extends BaseRepository
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
        return ThirdVideoSection::class;
    }

    /**
     * @param  array  $input
     * @return void
     */
    public function updateData($input)
    {
        $short_title_lang = [
            'ar' => $input['short_title_ar'] ?? '',
            'tr' => $input['short_title_tr'] ?? '',
        ];
        $title_lang = [
            'ar' => $input['title_ar'] ?? '',
            'tr' => $input['title_tr'] ?? '',
        ];
        $input['short_title_lang'] = json_encode($short_title_lang); 
        $input['title_lang'] = json_encode($title_lang); 

        unset($input['short_title_ar'], $input['short_title_tr'], $input['title_ar'], $input['title_tr']);

        foreach ($input as $key => $value) {
            /** @var THirdVideoSection $thirdVideoSection */
            $thirdVideoSection = ThirdVideoSection::where('key', $key)->first();
            if (! $thirdVideoSection) {
                continue;
            }
            if (in_array($key, ['bg_image'])) {
                $this->fileUpload($thirdVideoSection, $value);
                continue;
            }
            $thirdVideoSection->update(['value' => $value]);
        }
    }

    /**
     * @param $thirdVideoSection
     * @param $file
     */
    public function fileUpload($thirdVideoSection, $file)
    {
        $thirdVideoSection->clearMediaCollection(ThirdVideoSection::VIDEO_SECTION_PATH);
        $media = $thirdVideoSection->addMedia($file)->toMediaCollection(ThirdVideoSection::VIDEO_SECTION_PATH,
            config('app.media_disc'));
        $thirdVideoSection->update(['value' => $media->getFullUrl()]);
    }
}
