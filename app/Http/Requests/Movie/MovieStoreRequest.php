<?php

namespace App\Http\Requests\Movie;

use Illuminate\Foundation\Http\FormRequest;

class MovieStoreRequest extends FormRequest
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
            'title' => 'required|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg',
            'genre_ids' => 'required|array',
            'genre_ids.*' => 'required|integer|required|exists:genres,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно к заполнению',
            'title.string' => 'Это поле дожно быть строкой',
            'genre_ids.required' => 'Это поле обязательно к заполнению',
            'poster.image' => 'Выбраный файл должен быть картинкой',
            'poster.mimes' => 'Картинка должна быть jpeg,png,jpg формата'
        ];
    }
}
