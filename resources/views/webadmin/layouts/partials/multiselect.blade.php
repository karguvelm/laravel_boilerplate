@push('css')
    <link rel="stylesheet" href="{{ asset('theme/plugins/multiselect/css/multi-select.css') }}">
    <style>
        .ms-container .ms-selection li.ms-hover, .ms-container .ms-selectable li.ms-hover{color:white !important;}
    </style>
@endpush

@push('js')
    <script type="text/javascript" src="{{ asset('theme/plugins/multiselect/js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/jquery.quicksearch.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.smulti').each(function () {
                $(this).multiSelect();
            });
        });
    </script>
@endpush