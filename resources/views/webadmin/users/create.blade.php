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
                        <div class="addcstbtn"><a href="{{ route('webadmin.users.index') }}" class="btn btn-success btn-sm">Back</a></div>
                    </div>
                    <div class="widget-body clearfix">
                        {{ Form::model($model, ['route' => 'webadmin.users.store', 'class' => 'form-horizontal','id'  => 'userForm','files'=> true,'autocomplete' => 'off']) }}
                            @include('webadmin.users.partials.form')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection