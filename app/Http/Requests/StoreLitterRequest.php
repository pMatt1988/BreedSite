<?php

namespace App\Http\Requests;

use App\Litter;
use Illuminate\Foundation\Http\FormRequest;

class StoreLitterRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('litter_create');
    }

    public function rules()
    {
        return [
            'name'      => [
                'min:2',
                'max:255',
                'required',
            ],
            'birthdate' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'sire_id'   => [
                'required',
                'integer',
            ],
            'dam_id'    => [
                'required',
                'integer',
            ],
        ];
    }
}
