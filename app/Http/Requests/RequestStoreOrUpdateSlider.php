<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateSlider extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title' => 'required',
            'image' => 'nullable',
            'desc' => 'nullable',
            'status' => 'required',
            'order' => 'required|numeric|',
        ];

        if($this->isMethod('POST')){
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $rules['order'] = 'unique:sliders,order';
        }

        return $rules;
    }
}
