@extends('webadmin.layouts.admin_layout')
@section('content')
@section('title',"Dashboard")
@include('webadmin.layouts.partials.breadcrumb')
<div class="widget-list row">
    <div class="widget-holder widget-sm col-md-3 widget-full-height">
        <div class="widget-bg">
            <div class="widget-body">
                <div class="counter-w-info media">
                    <div class="media-body">
                        <p class="text-muted mr-b-5">Users</p><span class="counter-title color-primary"><span class="counter">15</span> </span>
                    </div>
                    <!-- /.media-body -->
                    <div class="pull-right align-self-center"><i class="list-icon feather feather-user-plus bg-primary"></i>
                    </div>
                </div>
                <!-- /.counter-w-info -->
            </div>
            <!-- /.widget-body -->
        </div>
        <!-- /.widget-bg -->
    </div>
    <!-- /.widget-holder -->
</div>
<!-- /.widget-list -->
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.9.2/countUp.min.js"></script>
@endpush