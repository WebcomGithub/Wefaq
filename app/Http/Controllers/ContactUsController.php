<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest as UpdateContactUsRequestAlias;
use App\Models\ContactUs;
use App\Repositories\ContactUsRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;

class ContactUsController extends AppBaseController
{
    /**
     * @var ContactUsRepository
     */
    private $contactUsRepository;

    /**
     *  ContactUSController constructor.
     *
     * @param  ContactUsRepository  $contactUsRepository
     */
    public function __construct(ContactUsRepository $contactUsRepository)
    {
        $this->contactUsRepository = $contactUsRepository;
    }

    /**
     * @return Factory|Application|View
     */
    public function index()
    {
        $contact = ContactUs::where('key', 'menu_title_lang')->first();
        if (!$contact) {
            $menu_title_lang = [
                'ar' => '_',
                'tr' => '_',
            ];
    
            ContactUs::create([
                'key' => 'menu_title_lang',
                'value' => json_encode($menu_title_lang)
            ]);
        }

        $contactUs = ContactUs::pluck('value', 'key')->toArray();

        return view('admin.front-cms.contact-us.index',
            compact('contactUs'));
    }

    /**
     * @param  UpdateContactUsRequestAlias  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateContactUsRequest $request)
    {
        $this->contactUsRepository->updateData($request->all());

        Flash::success('Contact us updated successfully.');

        return Redirect(route('contact-us.index'));
    }
}
