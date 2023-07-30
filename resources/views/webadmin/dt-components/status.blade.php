<label class="switch">
    <input type="checkbox" name="status" value="1" class="switch_status" data-route="{{ route("webadmin.$routeName.status", $model->id) }}" data-id="{{$model->id}}" {{ ( (int)$model->user->status === ITEM_ACTIVE) ? "checked" : ""}}>
    <span class="slider round"></span>
</label>  