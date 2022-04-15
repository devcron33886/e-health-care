@extends('layouts.patient')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.prescription.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Prescription">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.prescription.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.prescription.fields.patient') }}
                        </th>
                        <th>
                            {{ trans('cruds.prescription.fields.medic_one') }}
                        </th>

                    </tr>

                    </thead>
                    <tbody>
                    @foreach($prescriptions as $key => $prescription)
                        <tr data-entry-id="{{ $prescription->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $prescription->id ?? '' }}
                            </td>
                            <td>
                                {{ $prescription->patient->name ?? '' }}
                            </td>
                            <td>
                                {{ $prescription->medic_one ?? '' }}
                            </td>
                            <td>
                                @can('prescription_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.prescriptions.show', $prescription->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('prescription_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.prescriptions.edit', $prescription->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('prescription_delete')
                                    <form action="{{ route('admin.prescriptions.destroy', $prescription->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('prescription_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.prescriptions.massDestroy') }}",
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
            let table = $('.datatable-Prescription:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

            let visibleColumnsIndexes = null;
            $('.datatable thead').on('input', '.search', function () {
                let strict = $(this).attr('strict') || false
                let value = strict && this.value ? "^" + this.value + "$" : this.value

                let index = $(this).parent().index()
                if (visibleColumnsIndexes !== null) {
                    index = visibleColumnsIndexes[index]
                }

                table
                    .column(index)
                    .search(value, strict)
                    .draw()
            });
            table.on('column-visibility.dt', function(e, settings, column, state) {
                visibleColumnsIndexes = []
                table.columns(":visible").every(function(colIdx) {
                    visibleColumnsIndexes.push(colIdx);
                });
            })
        })

    </script>
@endsection
