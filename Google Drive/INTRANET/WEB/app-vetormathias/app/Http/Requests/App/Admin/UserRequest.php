<?php

namespace Intranet\Http\Requests\App\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'USR_MAIL' => 'required',
            'USR_NAME' => 'required',
            'USR_LOGIN' => 'required',
            'USR_PASS' => 'required',

        ];
    }

    public function messages(){
        return[
            '*.required'=>'*Campo obrigatório'
        ];
    }
}
