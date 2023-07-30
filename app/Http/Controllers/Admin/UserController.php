<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public $modelClass = User::class;

    protected function _save($request, $model)
    {
        if($request->password == null){
            $data = $request->except(['_token','password','password_confirmation']);
        } else {
            $data = $request->except(['_token']);
            $data['password'] = bcrypt($request->password);
        }
        $model->fill($data);
        $model->save();
    }

    protected function _validation_rules($request, $id): array
    {
        $rules = [
            'name' => 'required|string',
            'email' => "required|string|email|unique:users,email,".$id,
        ];

        if(($request->password != null && $id != null) || $id == null){
            $rules['password'] =['required', 'string', 'min:6', 'confirmed'];
        }

        return $rules;
    }
}
