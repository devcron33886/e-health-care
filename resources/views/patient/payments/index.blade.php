@extends('layouts.patient')
@section('content')

    <div class="card">
        <div class="card-header">
            My Payments
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Payment">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.patient') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.start_from') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.active_until') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.status') }}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $key => $payment)
                        <tr data-entry-id="{{ $payment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $payment->id ?? '' }}
                            </td>
                            <td>
                                {{ $payment->patient->name ?? '' }}
                            </td>
                            <td>
                                {{ $payment->amount ?? '' }}
                            </td>
                            <td>
                                {{ $payment->mobile ?? '' }}
                            </td>
                            <td>
                                {{ $payment->start_from ?? '' }}
                            </td>
                            <td>
                                {{ $payment->active_until ?? '' }}
                            </td>
                            <td>
                                @if($payment->status==0)
                                    <button class="btn btn-warning">Pending</button>
                                @elseif($payment->status==1)
                                    <button class="btn btn-primary">Paid</button>
                                @endif
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
            @can('payment_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.payments.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
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
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
            });
            let table = $('.datatable-Payment:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
