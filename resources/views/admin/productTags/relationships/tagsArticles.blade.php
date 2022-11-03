<div class="m-3">
    @can('article_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.articles.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.article.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.article.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-tagsArticles">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.article.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.short_description') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.price') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.quantity') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.article_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.status') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.fooddeskid') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.companyid') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.categoryid') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.sell_product_option') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.allday_availability') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.advance_payment') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.allow_upload_image') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.available_after') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.traces_of') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.allergence') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.tags') }}
                            </th>
                            <th>
                                {{ trans('cruds.article.fields.images') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $key => $article)
                            <tr data-entry-id="{{ $article->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $article->id ?? '' }}
                                </td>
                                <td>
                                    {{ $article->name ?? '' }}
                                </td>
                                <td>
                                    {{ $article->short_description ?? '' }}
                                </td>
                                <td>
                                    {{ $article->price ?? '' }}
                                </td>
                                <td>
                                    {{ $article->quantity ?? '' }}
                                </td>
                                <td>
                                    {{ $article->article_number ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Article::STATUS_SELECT[$article->status] ?? '' }}
                                </td>
                                <td>
                                    {{ $article->fooddeskid ?? '' }}
                                </td>
                                <td>
                                    {{ $article->companyid ?? '' }}
                                </td>
                                <td>
                                    @foreach($article->categoryids as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ App\Models\Article::SELL_PRODUCT_OPTION_SELECT[$article->sell_product_option] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Article::ALLDAY_AVAILABILITY_SELECT[$article->allday_availability] ?? '' }}
                                </td>
                                <td>
                                    {{ $article->advance_payment ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Article::ALLOW_UPLOAD_IMAGE_RADIO[$article->allow_upload_image] ?? '' }}
                                </td>
                                <td>
                                    {{ $article->available_after ?? '' }}
                                </td>
                                <td>
                                    {{ $article->traces_of ?? '' }}
                                </td>
                                <td>
                                    {{ $article->allergence ?? '' }}
                                </td>
                                <td>
                                    @foreach($article->tags as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($article->images as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    @can('article_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.articles.show', $article->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('article_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.articles.edit', $article->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('article_delete')
                                        <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('article_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.articles.massDestroy') }}",
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
  let table = $('.datatable-tagsArticles:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection