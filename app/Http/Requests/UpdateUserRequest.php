<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'birthdate' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'phone' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'country' => [
                'string',
                'nullable',
            ],
            'zipcode' => [
                'string',
                'nullable',
            ],
            'eme_contact_person' => [
                'string',
                'nullable',
            ],
            'eme_contact_number' => [
                'string',
                'nullable',
            ],
            'occupation' => [
                'string',
                'nullable',
            ],
            'process_number' => [
                'string',
                'nullable',
            ],
            'national_number' => [
                'string',
                'nullable',
            ],
            'health_number' => [
                'string',
                'nullable',
            ],
            'vat_number' => [
                'string',
                'nullable',
            ],
            'allergies.*' => [
                'integer',
            ],
            'allergies' => [
                'array',
            ],
            'tags.*' => [
                'integer',
            ],
            'tags' => [
                'array',
            ],
            'diets.*' => [
                'integer',
            ],
            'diets' => [
                'array',
            ],
            'constituents.*' => [
                'integer',
            ],
            'constituents' => [
                'array',
            ],
            'favourite_food' => [
                'string',
                'nullable',
            ],
            'disliked_food' => [
                'string',
                'nullable',
            ],
        ];
    }
}
