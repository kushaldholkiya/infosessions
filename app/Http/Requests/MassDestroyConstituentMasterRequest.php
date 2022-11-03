<?php

namespace App\Http\Requests;

use App\Models\ConstituentMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyConstituentMasterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('constituent_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:constituent_masters,id',
        ];
    }
}
