<div class="m-3">
    @can('user_eating_moment_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.user-eating-moments.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.userEatingMoment.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.userEatingMoment.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-eatingMomentUserEatingMoments">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.userEatingMoment.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.userEatingMoment.fields.userid') }}
                            </th>
                            <th>
                                {{ trans('cruds.userEatingMoment.fields.day') }}
                            </th>
                            <th>
                                {{ trans('cruds.userEatingMoment.fields.eating_moment') }}
                            </th>
                            <th>
                                {{ trans('cruds.userEatingMoment.fields.time') }}
                            </th>
                            <th>
                                {{ trans('cruds.userEatingMoment.fields.allowed_categories') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userEatingMoments as $key => $userEatingMoment)
                            <tr data-entry-id="{{ $userEatingMoment->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $userEatingMoment->id ?? '' }}
                                </td>
                                <td>
                                    {{ $userEatingMoment->userid->name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\UserEatingMoment::DAY_SELECT[$userEatingMoment->day] ?? '' }}
                                </td>
                                <td>
                                    {{ $userEatingMoment->eating_moment->name ?? '' }}
                                </td>
                                <td>
                                    {{ $userEatingMoment->time ?? '' }}
                                </td>
                                <td>
                                    @foreach($userEatingMoment->allowed_categories as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('user_eating_moment_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.user-eating-moments.show', $userEatingMoment->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('user_eating_moment_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.user-eating-moments.edit', $userEatingMoment->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('user_eating_moment_delete')
                                        <form action="{{ route('admin.user-eating-moments.destroy', $userEatingMoment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('user_eating_moment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.user-eating-moments.massDestroy') }}",
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
  let table = $('.datatable-eatingMomentUserEatingMoments:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection