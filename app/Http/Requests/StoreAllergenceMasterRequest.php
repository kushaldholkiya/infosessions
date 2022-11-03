<?php

namespace App\Http\Requests;

use App\Models\AllergenceMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAllergenceMasterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('allergence_master_create');
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
