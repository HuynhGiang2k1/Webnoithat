<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'string',
                'email:filter',
                'unique:users'
            ],
            'password' => [
                'required',
                'min:8'
            ],
            'passwordConfirm' => [
                'required',
                'min:8',
                'same:password'
            ],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Trường này không được để trống',
            'email'    => 'Email không đúng định dạng',
            'min'      => 'Mật khẩu phải tối thiểu :min ký tự',
            'unique'   => 'Email đã được sử dụng',
            'same'     => 'Password nhập lại không khớp',
        ];
    }
}
