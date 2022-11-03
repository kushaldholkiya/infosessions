@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="last_name">{{ trans('cruds.user.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                @if($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\User::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', $user->gender) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birthdate">{{ trans('cruds.user.fields.birthdate') }}</label>
                <input class="form-control date {{ $errors->has('birthdate') ? 'is-invalid' : '' }}" type="text" name="birthdate" id="birthdate" value="{{ old('birthdate', $user->birthdate) }}">
                @if($errors->has('birthdate'))
                    <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.birthdate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.user.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="number" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" step="1">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country">{{ trans('cruds.user.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', $user->country) }}">
                @if($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.user.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address', $user->address) }}</textarea>
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zipcode">{{ trans('cruds.user.fields.zipcode') }}</label>
                <input class="form-control {{ $errors->has('zipcode') ? 'is-invalid' : '' }}" type="text" name="zipcode" id="zipcode" value="{{ old('zipcode', $user->zipcode) }}">
                @if($errors->has('zipcode'))
                    <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.zipcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.maritial_status') }}</label>
                <select class="form-control {{ $errors->has('maritial_status') ? 'is-invalid' : '' }}" name="maritial_status" id="maritial_status">
                    <option value disabled {{ old('maritial_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\User::MARITIAL_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('maritial_status', $user->maritial_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('maritial_status'))
                    <span class="text-danger">{{ $errors->first('maritial_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.maritial_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="eme_contact_person">{{ trans('cruds.user.fields.eme_contact_person') }}</label>
                <input class="form-control {{ $errors->has('eme_contact_person') ? 'is-invalid' : '' }}" type="text" name="eme_contact_person" id="eme_contact_person" value="{{ old('eme_contact_person', $user->eme_contact_person) }}">
                @if($errors->has('eme_contact_person'))
                    <span class="text-danger">{{ $errors->first('eme_contact_person') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.eme_contact_person_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="eme_contact_number">{{ trans('cruds.user.fields.eme_contact_number') }}</label>
                <input class="form-control {{ $errors->has('eme_contact_number') ? 'is-invalid' : '' }}" type="text" name="eme_contact_number" id="eme_contact_number" value="{{ old('eme_contact_number', $user->eme_contact_number) }}">
                @if($errors->has('eme_contact_number'))
                    <span class="text-danger">{{ $errors->first('eme_contact_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.eme_contact_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="occupation">{{ trans('cruds.user.fields.occupation') }}</label>
                <input class="form-control {{ $errors->has('occupation') ? 'is-invalid' : '' }}" type="text" name="occupation" id="occupation" value="{{ old('occupation', $user->occupation) }}">
                @if($errors->has('occupation'))
                    <span class="text-danger">{{ $errors->first('occupation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.occupation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="process_number">{{ trans('cruds.user.fields.process_number') }}</label>
                <input class="form-control {{ $errors->has('process_number') ? 'is-invalid' : '' }}" type="text" name="process_number" id="process_number" value="{{ old('process_number', $user->process_number) }}">
                @if($errors->has('process_number'))
                    <span class="text-danger">{{ $errors->first('process_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.process_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="national_number">{{ trans('cruds.user.fields.national_number') }}</label>
                <input class="form-control {{ $errors->has('national_number') ? 'is-invalid' : '' }}" type="text" name="national_number" id="national_number" value="{{ old('national_number', $user->national_number) }}">
                @if($errors->has('national_number'))
                    <span class="text-danger">{{ $errors->first('national_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.national_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="health_number">{{ trans('cruds.user.fields.health_number') }}</label>
                <input class="form-control {{ $errors->has('health_number') ? 'is-invalid' : '' }}" type="text" name="health_number" id="health_number" value="{{ old('health_number', $user->health_number) }}">
                @if($errors->has('health_number'))
                    <span class="text-danger">{{ $errors->first('health_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.health_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vat_number">{{ trans('cruds.user.fields.vat_number') }}</label>
                <input class="form-control {{ $errors->has('vat_number') ? 'is-invalid' : '' }}" type="text" name="vat_number" id="vat_number" value="{{ old('vat_number', $user->vat_number) }}">
                @if($errors->has('vat_number'))
                    <span class="text-danger">{{ $errors->first('vat_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.vat_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="other_information">{{ trans('cruds.user.fields.other_information') }}</label>
                <textarea class="form-control {{ $errors->has('other_information') ? 'is-invalid' : '' }}" name="other_information" id="other_information">{{ old('other_information', $user->other_information) }}</textarea>
                @if($errors->has('other_information'))
                    <span class="text-danger">{{ $errors->first('other_information') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.other_information_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="allergies">{{ trans('cruds.user.fields.allergies') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('allergies') ? 'is-invalid' : '' }}" name="allergies[]" id="allergies" multiple>
                    @foreach($allergies as $id => $allergy)
                        <option value="{{ $id }}" {{ (in_array($id, old('allergies', [])) || $user->allergies->contains($id)) ? 'selected' : '' }}>{{ $allergy }}</option>
                    @endforeach
                </select>
                @if($errors->has('allergies'))
                    <span class="text-danger">{{ $errors->first('allergies') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.allergies_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tags">{{ trans('cruds.user.fields.tags') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple>
                    @foreach($tags as $id => $tag)
                        <option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || $user->tags->contains($id)) ? 'selected' : '' }}>{{ $tag }}</option>
                    @endforeach
                </select>
                @if($errors->has('tags'))
                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.tags_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="diets">{{ trans('cruds.user.fields.diets') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('diets') ? 'is-invalid' : '' }}" name="diets[]" id="diets" multiple>
                    @foreach($diets as $id => $diet)
                        <option value="{{ $id }}" {{ (in_array($id, old('diets', [])) || $user->diets->contains($id)) ? 'selected' : '' }}>{{ $diet }}</option>
                    @endforeach
                </select>
                @if($errors->has('diets'))
                    <span class="text-danger">{{ $errors->first('diets') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.diets_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="constituents">{{ trans('cruds.user.fields.constituents') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('constituents') ? 'is-invalid' : '' }}" name="constituents[]" id="constituents" multiple>
                    @foreach($constituents as $id => $constituent)
                        <option value="{{ $id }}" {{ (in_array($id, old('constituents', [])) || $user->constituents->contains($id)) ? 'selected' : '' }}>{{ $constituent }}</option>
                    @endforeach
                </select>
                @if($errors->has('constituents'))
                    <span class="text-danger">{{ $errors->first('constituents') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.constituents_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="favourite_food">{{ trans('cruds.user.fields.favourite_food') }}</label>
                <input class="form-control {{ $errors->has('favourite_food') ? 'is-invalid' : '' }}" type="text" name="favourite_food" id="favourite_food" value="{{ old('favourite_food', $user->favourite_food) }}">
                @if($errors->has('favourite_food'))
                    <span class="text-danger">{{ $errors->first('favourite_food') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.favourite_food_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disliked_food">{{ trans('cruds.user.fields.disliked_food') }}</label>
                <input class="form-control {{ $errors->has('disliked_food') ? 'is-invalid' : '' }}" type="text" name="disliked_food" id="disliked_food" value="{{ old('disliked_food', $user->disliked_food) }}">
                @if($errors->has('disliked_food'))
                    <span class="text-danger">{{ $errors->first('disliked_food') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.disliked_food_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="diseases">{{ trans('cruds.user.fields.diseases') }}</label>
                <textarea class="form-control {{ $errors->has('diseases') ? 'is-invalid' : '' }}" name="diseases" id="diseases">{{ old('diseases', $user->diseases) }}</textarea>
                @if($errors->has('diseases'))
                    <span class="text-danger">{{ $errors->first('diseases') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.diseases_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="medication">{{ trans('cruds.user.fields.medication') }}</label>
                <textarea class="form-control {{ $errors->has('medication') ? 'is-invalid' : '' }}" name="medication" id="medication">{{ old('medication', $user->medication) }}</textarea>
                @if($errors->has('medication'))
                    <span class="text-danger">{{ $errors->first('medication') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.medication_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="personal_history">{{ trans('cruds.user.fields.personal_history') }}</label>
                <textarea class="form-control {{ $errors->has('personal_history') ? 'is-invalid' : '' }}" name="personal_history" id="personal_history">{{ old('personal_history', $user->personal_history) }}</textarea>
                @if($errors->has('personal_history'))
                    <span class="text-danger">{{ $errors->first('personal_history') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.personal_history_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection