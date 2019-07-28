<?php

namespace App\Http\Requests;

use App\Dog;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDogRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('dog_edit');
    }

    public function rules()
    {
        return [
            'name'      => [
                'min:2',
                'max:255',
                'required',
                'unique:dogs,name,' . request()->route('dog')->id,
            ],
            'birthdate' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'slug'      => [
                'min:2',
                'max:255',
                'required',
                'unique:dogs,slug,' . request()->route('dog')->id,
            ],
            'gender'    => [
                'required',
            ],
        ];
    }
}
