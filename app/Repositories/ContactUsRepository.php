<?php

namespace App\Repositories;

use App\Models\ContactUs;

/**
 * Class ContactUsRepository
 */
class ContactUsRepository extends BaseRepository
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
        return ContactUs::class;
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
        $input['menu_title_lang'] = json_encode($menu_title_lang); 
        unset($input['menu_title_ar'], $input['menu_title_tr']);
        
        foreach ($input as $key => $value) {
            /** @var ContactUs $contactUs */
            $contactUs = ContactUs::where('key', $key)->first();
            if (! $contactUs) {
                continue;
            }
            if ($key == 'menu_image') {
                $this->fileUpload($contactUs, $value);
                continue;
            }
            $contactUs->update(['value' => $value]);
        }
    }

    /**
     * @param $contactUs
     * @param $file
     */
    public function fileUpload($contactUs, $file)
    {
        $contactUs->clearMediaCollection(ContactUs::CONTACT_US_PATH);
        $media = $contactUs->addMedia($file)->toMediaCollection(ContactUs::CONTACT_US_PATH, config('app.media_disc'));
        $contactUs->update(['value' => $media->getFullUrl()]);
    }
}
