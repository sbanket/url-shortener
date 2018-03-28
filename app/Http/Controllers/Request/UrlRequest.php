<?php

namespace App\Http\Controllers\Request;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UrlRequest
 *
 * @package App\Http\Controllers\Request
 */
class UrlRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        $rules = [
            'original_url' => [
                'required',
                'url'
            ],
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'original_url.required' => 'Url is required',
            'original_url.url' => 'Format is invalid.',
        ];
    }

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
