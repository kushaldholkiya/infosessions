<div class="m-3">
    @can('article_main_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.article-mains.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.articleMain.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.articleMain.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-parentArticleArticleMains">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.articleMain.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleMain.fields.parent_article') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleMain.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleMain.fields.article_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleMain.fields.status') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleMain.fields.categoryid') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleMain.fields.products') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articleMains as $key => $articleMain)
                            <tr data-entry-id="{{ $articleMain->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $articleMain->id ?? '' }}
                                </td>
                                <td>
                                    {{ $articleMain->parent_article->name ?? '' }}
                                </td>
                                <td>
                                    {{ $articleMain->name ?? '' }}
                                </td>
                                <td>
                                    {{ $articleMain->article_number ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\ArticleMain::STATUS_SELECT[$articleMain->status] ?? '' }}
                                </td>
                                <td>
                                    @foreach($articleMain->categoryids as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($articleMain->products as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('article_main_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.article-mains.show', $articleMain->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('article_main_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.article-mains.edit', $articleMain->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('article_main_delete')
                                        <form action="{{ route('admin.article-mains.destroy', $articleMain->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('article_main_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.article-mains.massDestroy') }}",
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
  let table = $('.datatable-parentArticleArticleMains:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection