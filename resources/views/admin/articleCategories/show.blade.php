@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.articleCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.article-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.articleCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $articleCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.articleCategory.fields.name') }}
                        </th>
                        <td>
                            {{ $articleCategory->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.articleCategory.fields.description') }}
                        </th>
                        <td>
                            {{ $articleCategory->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.articleCategory.fields.parentcatid') }}
                        </th>
                        <td>
                            {{ $articleCategory->parentcatid->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.article-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#parentcatid_article_categories" role="tab" data-toggle="tab">
                {{ trans('cruds.articleCategory.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="parentcatid_article_categories">
            @includeIf('admin.articleCategories.relationships.parentcatidArticleCategories', ['articleCategories' => $articleCategory->parentcatidArticleCategories])
        </div>
    </div>
</div>

@endsection