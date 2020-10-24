<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionsRequest extends FormRequest
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
        $request = request()->all();
        $rules = [];

        if (isset($request['is_image']) && $request['is_image']) {
            $rules['option_image'] = 'required|max:1024|image|mimes:jpg,jpeg,png';
        }else{
            $rules['option_text'] = 'required|max:255';
        }
        return  $rules;
    }
}
