@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.ingredient.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ingredients.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.ingredient.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredient.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.ingredient.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredient.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="producer">{{ trans('cruds.ingredient.fields.producer') }}</label>
                <input class="form-control {{ $errors->has('producer') ? 'is-invalid' : '' }}" type="text" name="producer" id="producer" value="{{ old('producer', '') }}">
                @if($errors->has('producer'))
                    <span class="text-danger">{{ $errors->first('producer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredient.fields.producer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="origin">{{ trans('cruds.ingredient.fields.origin') }}</label>
                <input class="form-control {{ $errors->has('origin') ? 'is-invalid' : '' }}" type="text" name="origin" id="origin" value="{{ old('origin', '') }}">
                @if($errors->has('origin'))
                    <span class="text-danger">{{ $errors->first('origin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredient.fields.origin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="allergence">{{ trans('cruds.ingredient.fields.allergence') }}</label>
                <input class="form-control {{ $errors->has('allergence') ? 'is-invalid' : '' }}" type="text" name="allergence" id="allergence" value="{{ old('allergence', '') }}">
                @if($errors->has('allergence'))
                    <span class="text-danger">{{ $errors->first('allergence') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredient.fields.allergence_helper') }}</span>
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