<?php

namespace App\Http\Requests;

use App\Dog;
use Illuminate\Foundation\Http\FormRequest;

class StoreDogRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('dog_create');
    }

    public function rules()
    {
        return [
            'name'      => [
                'min:2',
                'max:255',
                'required',
                'unique:dogs',
            ],
            'birthdate' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'slug'      => [
                'min:2',
                'max:255',
                'required',
                'unique:dogs',
            ],
            'gender'    => [
                'required',
            ],
        ];
    }
}
