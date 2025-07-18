<?php

namespace App\Http\Requests;

use App\Models\Faqs;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFaqsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Faqs::$rules;

        $rules['title'] = 'required|max:255|unique:faqs,title,'.$this->route('faq')->id;

        return $rules;
    }
}
