@hasAccess("$routeName.edit")
<a href="{{ route("webadmin.$routeName.edit", $model->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
@endhasAccess

@hasAccess("$routeName.destroy")
<a href="javascript:void(0);" class="btndelete btn btn-danger btn-sm" data-id="{{$model->id}}" data-route="{{ route("webadmin.$routeName.destroy", $model->id) }}">
    <i class="fa fa-trash"></i>
</a>
@endhasAccess