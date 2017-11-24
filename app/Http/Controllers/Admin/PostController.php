<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CrudController;

class PostController extends CrudController
{
    
    public $itemName = 'post';
    public $listName = 'posts';
    public $itemPerPage = 1;
    
    public $viewPath = 'admin.post';
    public $modelPath = 'App\Post';
    public $routePath = 'admin.post';
    
    /**
     * For lazy view form and list
     * The attribute['name'] is required, for use in action below:
     * - when fields have attribute['list'] it will show in table of items
     * - when fields have attribute['type'] it will show in form to submit data
     */
    public $fields = [
        [
            'list' => 'Id',
            'name' => 'id'
        ],
        [
            'list' => 'Title',
            'name' => 'title',
            'type' => 'text',
            'label' => 'Title',
            'attributes' => [
                'placeholder' => 'Enter the title ...'
            ]
        ],
        [
            'list' => '<b>Content</b> :D',
            'name' => 'content',
            'type' => 'textarea',
            'label' => 'Content',
            'attributes' => [
                'placeholder' => 'Enter the content here ...'
            ]
        ]
    ];
    
    public $validateRules = [];
    
    public $validateCreateRules = [
        'title' => 'required|unique:posts',
        'content' => 'required'        
    ];
    
    public $validateUpdateRules = [
        'title' => 'required',
        'content' => 'required'        
    ];
    
    public function __construct() {
        parent::__construct();
    }
    

}