<div class="form-group row">
    {{ Form::label('name', 'User Name *', ['class' => 'col-sm-3 col-form-label  ']) }}
    <div class="col-sm-9">
        {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('email', 'Email *', ['class' => 'col-sm-3 col-form-label  ']) }}
    <div class="col-sm-9">
        {{ Form::text('email', old('email'), ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('password', 'Password *', ['class' => 'col-sm-3 col-form-label  ']) }}
    <div class="col-sm-9">
        {{ Form::password('password', ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-sm-3 col-form-label  ']) }}
    <div class="col-sm-9">
        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-actions">
    <div class="form-group row">
        <div class="col-md-9 ml-md-auto btn-list">
            <input class="btn btn-primary btn-rounded" type="submit" value="Submit" name="submit">
            <a class="btn btn-outline-default btn-rounded" href="{{ route('webadmin.users.index') }}">Cancel</a>
        </div>
    </div>
</div>