<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create page');
    }

    public function getValidatorInstance() {
        $validator = parent::getValidatorInstance();

        $validator->sometimes('alias', 'unique:pages|max:255', function($input) {
            if($this->route()->hasParameter('page')) {
                $model = $this->route()->parameter('page');

                return ($model->alias !== $input->alias) && !empty($input->alias);
            }

            return !empty($input->alias);
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
            'title' => 'required|max:255',
            'keywords' => 'max:255',
            'meta_desc' => 'max:255',
        ];
    }
}
