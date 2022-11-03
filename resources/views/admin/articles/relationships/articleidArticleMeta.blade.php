<div class="m-3">
    @can('article_metum_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.article-meta.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.articleMetum.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.articleMetum.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-articleidArticleMeta">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.articleMetum.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleMetum.fields.articleid') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.article_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleMetum.fields.key') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleMetum.fields.value') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleMetum.fields.value_2') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleMetum.fields.section') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleMetum.fields.table_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleMetum.fields.mappingid') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articleMeta as $key => $articleMetum)
                            <tr data-entry-id="{{ $articleMetum->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $articleMetum->id ?? '' }}
                                </td>
                                <td>
                                    {{ $articleMetum->articleid->name ?? '' }}
                                </td>
                                <td>
                                    {{ $articleMetum->articleid->article_number ?? '' }}
                                </td>
                                <td>
                                    {{ $articleMetum->key->name ?? '' }}
                                </td>
                                <td>
                                    {{ $articleMetum->value ?? '' }}
                                </td>
                                <td>
                                    {{ $articleMetum->value_2 ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\ArticleMetum::SECTION_SELECT[$articleMetum->section] ?? '' }}
                                </td>
                                <td>
                                    {{ $articleMetum->table_name ?? '' }}
                                </td>
                                <td>
                                    {{ $articleMetum->mappingid ?? '' }}
                                </td>
                                <td>
                                    @can('article_metum_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.article-meta.show', $articleMetum->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('article_metum_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.article-meta.edit', $articleMetum->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('article_metum_delete')
                                        <form action="{{ route('admin.article-meta.destroy', $articleMetum->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('article_metum_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.article-meta.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-articleidArticleMeta:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection