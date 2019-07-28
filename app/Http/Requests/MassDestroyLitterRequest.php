<?php

namespace App\Http\Requests;

use App\Litter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyLitterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('litter_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:litters,id',
        ];
    }
}
