<?php

namespace App\Http\Requests;

use App\Models\ConstituentMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateConstituentMasterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('constituent_master_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:constituent_masters,name,' . request()->route('constituent_master')->id,
            ],
        ];
    }
}
