@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.users.update", [$user->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="last_name">{{ trans('cruds.user.fields.last_name') }}</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                            @if($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.last_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control" type="password" name="password" id="password">
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="roles[]" id="roles" multiple required>
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('roles') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.user.fields.gender') }}</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\User::GENDER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('gender', $user->gender) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">{{ trans('cruds.user.fields.birthdate') }}</label>
                            <input class="form-control date" type="text" name="birthdate" id="birthdate" value="{{ old('birthdate', $user->birthdate) }}">
                            @if($errors->has('birthdate'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('birthdate') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.birthdate_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ trans('cruds.user.fields.phone') }}</label>
                            <input class="form-control" type="number" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" step="1">
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="country">{{ trans('cruds.user.fields.country') }}</label>
                            <input class="form-control" type="text" name="country" id="country" value="{{ old('country', $user->country) }}">
                            @if($errors->has('country'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('country') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.country_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">{{ trans('cruds.user.fields.address') }}</label>
                            <textarea class="form-control" name="address" id="address">{{ old('address', $user->address) }}</textarea>
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="zipcode">{{ trans('cruds.user.fields.zipcode') }}</label>
                            <input class="form-control" type="text" name="zipcode" id="zipcode" value="{{ old('zipcode', $user->zipcode) }}">
                            @if($errors->has('zipcode'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('zipcode') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.zipcode_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.user.fields.maritial_status') }}</label>
                            <select class="form-control" name="maritial_status" id="maritial_status">
                                <option value disabled {{ old('maritial_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\User::MARITIAL_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('maritial_status', $user->maritial_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('maritial_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('maritial_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.maritial_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="eme_contact_person">{{ trans('cruds.user.fields.eme_contact_person') }}</label>
                            <input class="form-control" type="text" name="eme_contact_person" id="eme_contact_person" value="{{ old('eme_contact_person', $user->eme_contact_person) }}">
                            @if($errors->has('eme_contact_person'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('eme_contact_person') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.eme_contact_person_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="eme_contact_number">{{ trans('cruds.user.fields.eme_contact_number') }}</label>
                            <input class="form-control" type="text" name="eme_contact_number" id="eme_contact_number" value="{{ old('eme_contact_number', $user->eme_contact_number) }}">
                            @if($errors->has('eme_contact_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('eme_contact_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.eme_contact_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="occupation">{{ trans('cruds.user.fields.occupation') }}</label>
                            <input class="form-control" type="text" name="occupation" id="occupation" value="{{ old('occupation', $user->occupation) }}">
                            @if($errors->has('occupation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('occupation') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.occupation_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="process_number">{{ trans('cruds.user.fields.process_number') }}</label>
                            <input class="form-control" type="text" name="process_number" id="process_number" value="{{ old('process_number', $user->process_number) }}">
                            @if($errors->has('process_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('process_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.process_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="national_number">{{ trans('cruds.user.fields.national_number') }}</label>
                            <input class="form-control" type="text" name="national_number" id="national_number" value="{{ old('national_number', $user->national_number) }}">
                            @if($errors->has('national_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('national_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.national_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="health_number">{{ trans('cruds.user.fields.health_number') }}</label>
                            <input class="form-control" type="text" name="health_number" id="health_number" value="{{ old('health_number', $user->health_number) }}">
                            @if($errors->has('health_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('health_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.health_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="vat_number">{{ trans('cruds.user.fields.vat_number') }}</label>
                            <input class="form-control" type="text" name="vat_number" id="vat_number" value="{{ old('vat_number', $user->vat_number) }}">
                            @if($errors->has('vat_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vat_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.vat_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="other_information">{{ trans('cruds.user.fields.other_information') }}</label>
                            <textarea class="form-control" name="other_information" id="other_information">{{ old('other_information', $user->other_information) }}</textarea>
                            @if($errors->has('other_information'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('other_information') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.other_information_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="allergies">{{ trans('cruds.user.fields.allergies') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="allergies[]" id="allergies" multiple>
                                @foreach($allergies as $id => $allergy)
                                    <option value="{{ $id }}" {{ (in_array($id, old('allergies', [])) || $user->allergies->contains($id)) ? 'selected' : '' }}>{{ $allergy }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('allergies'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('allergies') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.allergies_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tags">{{ trans('cruds.user.fields.tags') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="tags[]" id="tags" multiple>
                                @foreach($tags as $id => $tag)
                                    <option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || $user->tags->contains($id)) ? 'selected' : '' }}>{{ $tag }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tags'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tags') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.tags_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="diets">{{ trans('cruds.user.fields.diets') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="diets[]" id="diets" multiple>
                                @foreach($diets as $id => $diet)
                                    <option value="{{ $id }}" {{ (in_array($id, old('diets', [])) || $user->diets->contains($id)) ? 'selected' : '' }}>{{ $diet }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('diets'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('diets') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.diets_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="constituents">{{ trans('cruds.user.fields.constituents') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="constituents[]" id="constituents" multiple>
                                @foreach($constituents as $id => $constituent)
                                    <option value="{{ $id }}" {{ (in_array($id, old('constituents', [])) || $user->constituents->contains($id)) ? 'selected' : '' }}>{{ $constituent }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('constituents'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('constituents') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.constituents_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="favourite_food">{{ trans('cruds.user.fields.favourite_food') }}</label>
                            <input class="form-control" type="text" name="favourite_food" id="favourite_food" value="{{ old('favourite_food', $user->favourite_food) }}">
                            @if($errors->has('favourite_food'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('favourite_food') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.favourite_food_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="disliked_food">{{ trans('cruds.user.fields.disliked_food') }}</label>
                            <input class="form-control" type="text" name="disliked_food" id="disliked_food" value="{{ old('disliked_food', $user->disliked_food) }}">
                            @if($errors->has('disliked_food'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('disliked_food') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.disliked_food_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="diseases">{{ trans('cruds.user.fields.diseases') }}</label>
                            <textarea class="form-control" name="diseases" id="diseases">{{ old('diseases', $user->diseases) }}</textarea>
                            @if($errors->has('diseases'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('diseases') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.diseases_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="medication">{{ trans('cruds.user.fields.medication') }}</label>
                            <textarea class="form-control" name="medication" id="medication">{{ old('medication', $user->medication) }}</textarea>
                            @if($errors->has('medication'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('medication') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.medication_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="personal_history">{{ trans('cruds.user.fields.personal_history') }}</label>
                            <textarea class="form-control" name="personal_history" id="personal_history">{{ old('personal_history', $user->personal_history) }}</textarea>
                            @if($errors->has('personal_history'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('personal_history') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection