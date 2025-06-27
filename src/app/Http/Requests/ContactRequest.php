<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'tel' => 'required|regex:/^[0-9]+$/|max:11',
            'address' => 'required',
            'example' => 'required',
            'content' => 'required|max:120',
        ];
    }

    public function messages()
  {
    return [
      'last_name.required' => '姓を入力してください',
      'first_name.required' => '名を入力してください',
      'gender.required' => '性別を入力してください',
      'email.required' => 'メールアドレスを入力してください',
      'email.email' => 'メールアドレスはメール形式で入力してください',
      'tel.required' => '電話番号を入力してください',
      'tel.regex:/^[0-9]+$' => '電話番号は5桁までの数字で入力してください',
      'tel.max:11' => '電話番号は5桁までの数字で入力してください',
      'tel.required' => '電話番号を入力してください',
      'example.required' => 'お問い合わせの種類を選択してください',
      'content.required' => 'お問い合わせ内容を入力してください',
      'tel.max:120' => 'お問合せ内容は120文字以内で入力してください',
}
