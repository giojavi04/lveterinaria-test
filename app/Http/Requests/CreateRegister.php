<?php

namespace LVeterinaria\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRegister extends FormRequest
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
        return [
            'user_id' => 'integer',
            'pet_img' => 'image',
            'qr' => 'image'
        ];
    }
}
