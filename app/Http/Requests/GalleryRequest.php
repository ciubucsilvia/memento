<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create gallery');
    }

    public function getValidatorInstance() {
        $validator = parent::getValidatorInstance();

        $validator->sometimes('image', 'required|max:2000', function() {
            if($this->route()->hasParameter('gallery')) {
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
            'title' => 'max:255',
        ];
    }
}
