<?php

namespace App\Http\Requests;

use App\ContentTag;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContentTagRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('content_tag_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
