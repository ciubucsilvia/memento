<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create testimonial');
    }

    public function getValidatorInstance() {
        $validator = parent::getValidatorInstance();

        $validator->sometimes('image', 'required|max:2000', function() {
            if($this->route()->hasParameter('testimonial')) {
                 return false;
            }
            return true;
        });

        return $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'body' => 'required:max:350',
            'site_title' => 'max:255',
            'site_path' => 'max:255',
        ];
    }
}
