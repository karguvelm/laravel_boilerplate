@push('js')
<script src="{{ asset('libs/datatables/datatable.js') }}"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
<script src="{{ asset('webadmin/js/datatablefunctions.js') }}"></script>
@endpush

