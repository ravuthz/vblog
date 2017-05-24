<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

abstract class CrudController extends Controller
{
    protected $model;
    protected $entities = ['item', 'items'];
    protected $itemPerPage = 5;
    protected $formFields = [];
    protected $validateRules = [];
    protected $validateCreateRules = [];
    protected $validateUpdateRules = [];
    
    public function __construct() {
        $this->model = App::make($this->modelPath);
        View::share('routePath', $this->routePath);
    }
    
    public function getSingleRow($id) {
        return [
            $this->entities[0] => $this->model->findOrFail($id),
            $this->entities[1] => $this->model->paginate($this->itemPerPage)
        ];
    }
    
    public function getMultipleRows() {
        return [
            $this->entities[1] => $this->model->paginate($this->itemPerPage)
        ];
    }
    
    public function getValidView($view) {
        if (!View::exists($this->viewPath . ".$view")) {
            $this->viewPath = 'crud';
        }
        return $this->viewPath . ".$view";
    }
    
    public function checkValidation(Request $request, $rules) {
        if ($rules) {
            $this->validateRules = $rules;
        }
        $this->validate($request, $this->validateRules);
    }
    
    public function index(Request $request)
    {
        $data = $this->getMultipleRows();
        $data['formFields'] = $this->formFields;
        return view($this->getValidView('index'), $data);
    }

    public function create()
    {
        $data = $this->getMultipleRows();   
        $data['formFields'] = $this->formFields;
        return view($this->getValidView('create'), $data);
    }
    
    public function show($id)
    {
        $data = $this->getSingleRow($id);
        $data['formFields'] = $this->formFields;
        return view($this->getValidView('show'), $data);
    }

    public function edit($id)
    {
        $data = $this->getSingleRow($id);
        $data['formFields'] = $this->formFields;
        return view($this->getValidView('edit'), $data);
    }
    
    public function store(Request $request)
    {
        if ($this->validateCreateRules) {
            $this->validateRules = $this->validateCreateRules;
        }
        $this->validate($request, $this->validateRules);
        $this->model->create($request->all());
        return redirect('post');
    }
    
    public function update(Request $request, $id)
    {
        if ($this->validateUpdateRules) {
            $this->validateRules = $this->validateUpdateRules;
        }
        $this->validate($request, $this->validateRules);
        $this->model->findOrFail($id)->update($request->all());
        return redirect('post');
    }

    public function destroy($id)
    {
        $this->model->findOrFail($id)->delete();
        return redirect('post');
    }
}