<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create portfolio');
    }

    public function getValidatorInstance() {
        $validator = parent::getValidatorInstance();

        $validator->sometimes('alias', 'unique:portfolios|max:255', function($input) {
            if($this->route()->hasParameter('portfolio')) {
                $model = $this->route()->parameter('portfolio');
                return ($model->alias !== $input->alias) && !empty($input->alias);
            }
            
            return !empty($input->alias);
        });

        $validator->sometimes('image', 'required|max:2000', function() {
            if($this->route()->hasParameter('portfolio')) {
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
            'title' => 'required|max:255',
            // 'keywords' => 'required|max:255',
            // 'meta_desc' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required|numeric',
        ];
    }
}
