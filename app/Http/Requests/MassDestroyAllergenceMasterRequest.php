<?php

namespace App\Http\Requests;

use App\Models\AllergenceMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAllergenceMasterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('allergence_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:allergence_masters,id',
        ];
    }
}
