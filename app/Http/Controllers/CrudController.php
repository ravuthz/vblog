<?php

namespace App\Http\Controllers;

use App;
use Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

abstract class CrudController extends Controller
{
    private $model = null;
    
    public $data = [];
    public $route = null;
    public $itemPerPage = 10;
    
    public $validateRules = [];
    public $validateCreateRules = [];
    public $validateUpdateRules = [];
    
    public function __construct() {
        $this->model = App::make($this->modelPath);

        $this->validateAllFields();
        
        $this->makeData();
        $this->makeRoutes();
        $this->makeFields();
    }
    
    private function validateField($field) {
        if (!isset($this->{$field}) || !$this->{$field}) {
            throw new Exception("The " . $this->{$field} . " is required in child controller.");
        }
    }
    
    private function validateAllFields() {
        $fields = ['itemName', 'listName', 'viewPath', 'modelPath', 'routePath'];
        foreach($fields as $field) {
            $this->validateField($field);
        }
    }
    
    private function makeView($name) {
        if (!View::exists($this->viewPath . ".$name")) {
            $this->viewPath = 'crud';
        }
        return view($this->viewPath . ".$name", $this->data);
    }
    
    private function makeData() {
        $viewPath = $this->viewPath;
        
        $partial_form = "crud.form";
        if (View::exists($viewPath . '.form')) {
            $partial_form = $viewPath . '.form';
        }
        
        $partial_fields = "crud.fields";
        if (View::exists($viewPath . '.fields')) {
            $partial_fields = $viewPath . '.fields';
        }
        
        $this->data['viewPath'] = $this->viewPath;
        $this->data['itemName'] = $this->itemName;
        $this->data['listName'] = $this->listName;
        $this->data['partial'] = (object) [
            'form' => $partial_form,
            'fields' => $partial_fields
        ];
    }
    
    private function makeRoutes() {
        $route = $this->routePath;
        $this->route = (object) [
            'index' => $route . '.index',
            'create' => $route . '.create',
            'store' => $route . '.store',
            'edit' => $route . '.edit',
            'update' => $route . '.update',
            'show' => $route . '.show',
            'destroy' => $route . '.destroy'
        ];
        $this->data['route'] = $this->route;
    }
    
    private function makeFields() {
        if ($this->fields) {
            array_push($this->fields, ['list' => 'Actions', 'list_class' => 'text-center']);
            $this->data['fields'] = $this->fields;
        }
    }
    
    public function makeValidate($request) {
        if ($this->validateRules) {
            $validator = Validator::make($request->all(), $this->validateRules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
    }
    
    public function setValidationRules() {
        switch (func_num_args()) {
            case 1:
                $this->validateRules = func_get_arg(0);
                break;
            case 2:
                $this->validateRules = null;
                $this->validateCreateRules = func_get_arg(0);
                $this->validateUpdateRules = func_get_arg(1);
                break;
        }
    }
    
    public function getSingleRow($id) {
        return $this->model->findOrFail($id);
    }
    
    public function getMultipleRows($request) {
        if ($request->has('size')) {
            $this->itemPerPage = $request->get('size');
        }
        if ($request->has('search')) {
            return $this->model->search($request->get('search'))->paginate($this->itemPerPage);
        }
        return $this->model->paginate($this->itemPerPage);
    }

    public function index(Request $request) {
        $this->data[$this->listName] = $this->getMultipleRows($request);
        return $this->makeView('index');
    }

    public function create() {
        $this->data[$this->itemName] = null;
        return $this->makeView('create');
    }
    
    public function show($id) {
        $this->data[$this->itemName] = $this->getSingleRow($id);
        return $this->makeView('show');
    }

    public function edit($id) {
        $this->data[$this->itemName] = $this->getSingleRow($id);
        return $this->makeView('edit');
    }

    public function store(Request $request) {
        if ($this->validateCreateRules) {
            $this->validateRules = $this->validateCreateRules;
        }
        
        $this->makeValidate($request);
        
        $this->model->create($request->all());
        return redirect()->route($this->route->index)
            ->with('success', trans('crud.item.created', ['item' => $this->itemName]));
    }
    
    public function update(Request $request, $id) {
        if ($this->validateUpdateRules) {
            $this->validateRules = $this->validateUpdateRules;
        }
        
        $this->makeValidate($request);
        
        $this->model->findOrFail($id)->update($request->all());
        return redirect()->route($this->route->index)
            ->with('success', trans('crud.item.updated', ['item' => $this->itemName]));
    }

    public function destroy($id) {
        $this->model->findOrFail($id)->delete();
        return redirect($this->routePath)
            ->with('success', trans('crud.item.deleted', ['item' => $this->itemName]));
    }
}