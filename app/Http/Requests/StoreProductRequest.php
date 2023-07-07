<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        return [
            "title" => "required|min:3|max:50",
            "description" => "min:5|max:65535",
            "type" => "required|max:20",
            "image" => "max:255",
            "cooking_time" => "required|max:20",
            "weight" => "required|max:20",
        ];
    }

    /**
     * Get the validation message
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            "title.required" => "Il titolo è obbligatorio",
            "title.min" => "Il titolo deve essere almeno di :min caratteri"
        ];
    }
}
