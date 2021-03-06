<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:200'],
            'genre' => ['string', 'min:3', 'max:100'],
            'description' => ['required', 'min: 10'],
            'language' => ['min:2'],
            'size' => ['required', 'min:1', 'max:10'],
            'release' => ['integer'],
            'photo' => ['required'],
            'platform' => ['required'],
            'torrent' => ['required']
        ];
    }
}
