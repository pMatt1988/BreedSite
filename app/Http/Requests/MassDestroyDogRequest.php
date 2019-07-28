<?php

namespace App\Http\Requests;

use App\Dog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyDogRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dog_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dogs,id',
        ];
    }
}
