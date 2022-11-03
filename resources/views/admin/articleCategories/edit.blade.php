@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.articleCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.article-categories.update", [$articleCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.articleCategory.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $articleCategory->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.articleCategory.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.articleCategory.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $articleCategory->description) }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.articleCategory.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parentcatid_id">{{ trans('cruds.articleCategory.fields.parentcatid') }}</label>
                <select class="form-control select2 {{ $errors->has('parentcatid') ? 'is-invalid' : '' }}" name="parentcatid_id" id="parentcatid_id">
                    @foreach($parentcatids as $id => $entry)
                        <option value="{{ $id }}" {{ (old('parentcatid_id') ? old('parentcatid_id') : $articleCategory->parentcatid->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('parentcatid'))
                    <span class="text-danger">{{ $errors->first('parentcatid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.articleCategory.fields.parentcatid_helper') }}</span>
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