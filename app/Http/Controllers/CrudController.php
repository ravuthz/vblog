<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

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
    }
    
    public function getSingleRow($id) {
        return [
            $this->entities[0] => $this->model->findOrFail($id)    
        ];
    }
    
    public function getMultipleRows() {
        return [
            $this->entities[1] => $this->model->paginate($this->itemPerPage)
        ];
    }
   
    public function index(Request $request)
    {
        $data = $this->getMultipleRows();
        $data['formFields'] = $this->formFields;
        return view($this->viewPath . '.index', $data);
    }

    public function create()
    {
        $data = $this->getMultipleRows();   
        $data['formFields'] = $this->formFields;
        return view($this->viewPath . '.create', $data);
    }
    
    public function show($id)
    {
        $data = $this->getSingleRow($id);
        $data['formFields'] = $this->formFields;
        return view($this->viewPath . '.show', $data);
    }

    public function edit($id)
    {
        $data = $this->getSingleRow($id);
        $data['formFields'] = $this->formFields;
        return view($this->viewPath . '.edit', $data);
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