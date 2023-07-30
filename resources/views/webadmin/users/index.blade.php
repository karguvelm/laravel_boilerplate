@extends('webadmin.layouts.admin_layout')

@section('breadcrumb')
    @include('webadmin.layouts.partials.breadcrumb')
@endsection

@section('content')
<div class="widget-list">
    <div class="row">
        <div class="widget-holder col-md-12">
            <div class="widget-bg">
                <div class="widget-heading clearfix">
                    <div class="addcstbtn"><a href="{{ route('webadmin.users.create') }}" class="btn btn-success btn-sm">Add User</a></div>
                </div>
                <div class="widget-body clearfix">
                    {!! $dataTable->table(['class' => 'table table-striped table-responsive', 'id' => 'datatable-buttons']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('webadmin.layouts.partials.datatable_scripts')
