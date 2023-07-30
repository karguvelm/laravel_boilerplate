<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Exception;
use Validator;

trait RestControllerTrait
{
    public $modelClass;

    public $viewFolder;

    public $resourceRoute;

    public function __construct()
    {
        if(!$this->viewFolder){
            $this->viewFolder = Str::plural(strtolower(class_basename($this->modelClass)));
        }

        if(!$this->resourceRoute){
            $this->resourceRoute = Str::plural(strtolower(class_basename($this->modelClass)));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $dt = "\\App\\DataTables\\".class_basename($this->modelClass).'DataTable';
        $dataTable = new $dt;
        return $dataTable->render("webadmin.{$this->viewFolder}.index");
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create() :View
    {
        $model = $this->_createResource();
        $selectLookups = $this->_selectLookups();

        return view("webadmin.{$this->viewFolder}.create", compact('model', 'selectLookups'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param string $id
     * @return View
     */
    public function edit($id) :View
    {
        $model = $this->_getModel($id);
        $selectLookups = $this->_selectLookups($id);

        return view("webadmin.{$this->viewFolder}.edit", compact('model', 'id', 'selectLookups'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Redirector|JsonResponse
     */
    public function store(Request $request)
    {
        $validator = $this->_validate($request);

        if($validator != null && array_key_exists("error_message", $validator == null ? [] : $validator)){
            flash(implode('<br>',$validator['error_message']))->error();
            return back()->withInput();
        }

        $model = new $this->modelClass();
        $this->_save($request, $model);
        $model->refresh();

        if($request->ajax()){
            return response()->json($model);
        }else{
            flash(class_basename($this->modelClass).' Created Successfully')->success();
            if(@$request->route) {
                return redirect($request->route);
            }else{
                return redirect(route("webadmin.{$this->resourceRoute}.index"));
            }

        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param string $id
     * @return Redirector|JsonResponse
     */
    public function update(Request $request, $id)
    {
        $model = $this->_getModel($id);
        $this->_validate($request, $id);
        $this->_save($request, $model);
        $model->refresh();

        if($request->ajax()){
            return response()->json($model);
        }else{
            flash(class_basename($this->modelClass).' Created Successfully')->success();
            return redirect(route("webadmin.{$this->resourceRoute}.index"));
        }
    }

    /**
     * Show the specified resource.
     * @param string $id
     * @return View
     */
    public function show($id) :View
    {
        $result = $this->_getModel($id);
        return view("webadmin.{$this->viewFolder}.show", compact('result'));
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @throws Exception
     */
    public function destroy($id)
    {
        $model = $this->_getModel($id);
        $model->delete();
    }

    /**
     * @return mixed
     */
    protected function _createResource()
    {
        return new $this->modelClass;
    }

    /**
     * @param $request
     * @param $model
     */
    protected function _save($request, $model)
    {
        $data = $request->except(['_token']);
        $model->fill($data);
        $model->save();
    }

    /**
     * @param $id
     * @return Model
     */
    protected function _getModel($id)
    {
        return call_user_func_array([$this->modelClass, "findOrFail"], [$id]);
    }

    /**
     * @param $request
     * @param $id
     * @return array
     */
    protected function _validation_rules($request, $id) :array
    {
        return [
            //
        ];
    }

    /**
     * @return array
     */
    protected function _validation_messages() :array
    {
        return [
            //
        ];
    }

    /**
     * @param null $id
     * @return array
     */
    protected function _selectLookups($id = null) :array
    {
        return [
            //
        ];
    }

    /**
     * @param $request
     * @param null $id
     */
    private function _validate($request, $id = null)
    {
        $rules = $this->_validation_rules($request, $id);

        if(@request()->all()){
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
                $messages = $validator->messages();
                foreach ($messages->all(':message') as $key => $message)
                {
                    $row['error_message'][$key] = $message;
                }
                return $row;
            }
        }else{
            $messages = $this->_validation_messages();
            $validator = $this->validate($request, $rules, $messages);
        }
    }
}
