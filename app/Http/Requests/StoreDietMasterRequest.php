<?php

namespace App\Http\Requests;

use App\Models\DietMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDietMasterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('diet_master_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
