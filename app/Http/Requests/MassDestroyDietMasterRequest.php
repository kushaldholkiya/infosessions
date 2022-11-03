<?php

namespace App\Http\Requests;

use App\Models\DietMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDietMasterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('diet_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:diet_masters,id',
        ];
    }
}
