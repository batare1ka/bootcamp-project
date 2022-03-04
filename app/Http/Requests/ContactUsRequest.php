<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ContactUsRequest extends FormRequest
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
           "name" => ['required', 'string', 'min:2', 'max:100'],
           "email" => ['required', 'string', 'email', 'max:255'],
           "phone" => ['required', 'digits_between:2,20'],
           "country" => ['string', 'required', 'in:moldova,russia,ukraine,belarus,kazakhstan'],
           "region" => ['string', 'required', 'in:chisinau,causeni,stefan-voda,tiraspol'],
           "message" => ['required', 'min:10', 'string']
        ];
    }
}
