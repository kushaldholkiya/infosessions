@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.ingredient.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.ingredients.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.ingredient.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingredient.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.ingredient.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingredient.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="producer">{{ trans('cruds.ingredient.fields.producer') }}</label>
                            <input class="form-control" type="text" name="producer" id="producer" value="{{ old('producer', '') }}">
                            @if($errors->has('producer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('producer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingredient.fields.producer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="origin">{{ trans('cruds.ingredient.fields.origin') }}</label>
                            <input class="form-control" type="text" name="origin" id="origin" value="{{ old('origin', '') }}">
                            @if($errors->has('origin'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('origin') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingredient.fields.origin_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="allergence">{{ trans('cruds.ingredient.fields.allergence') }}</label>
                            <input class="form-control" type="text" name="allergence" id="allergence" value="{{ old('allergence', '') }}">
                            @if($errors->has('allergence'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('allergence') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection