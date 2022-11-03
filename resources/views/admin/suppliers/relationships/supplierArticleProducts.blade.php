<div class="m-3">
    @can('article_product_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.article-products.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.articleProduct.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.articleProduct.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-supplierArticleProducts">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.articleProduct.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleProduct.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleProduct.fields.supplier') }}
                            </th>
                            <th>
                                {{ trans('cruds.articleProduct.fields.allergen') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articleProducts as $key => $articleProduct)
                            <tr data-entry-id="{{ $articleProduct->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $articleProduct->id ?? '' }}
                                </td>
                                <td>
                                    {{ $articleProduct->name ?? '' }}
                                </td>
                                <td>
                                    {{ $articleProduct->supplier->name ?? '' }}
                                </td>
                                <td>
                                    @foreach($articleProduct->allergens as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('article_product_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.article-products.show', $articleProduct->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('article_product_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.article-products.edit', $articleProduct->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('article_product_delete')
                                        <form action="{{ route('admin.article-products.destroy', $articleProduct->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('article_product_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.article-products.massDestroy') }}",
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
  let table = $('.datatable-supplierArticleProducts:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection