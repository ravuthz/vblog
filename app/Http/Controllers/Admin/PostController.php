<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CrudController;

class PostController extends CrudController
{
    protected $viewPath = 'admin.posts';
    protected $modelPath = 'App\Post';
    protected $entities = ['post', 'posts'];
    
    protected $itemPerPage = 10;
    
    /**
     * Set validation rules for both create and update actions 
     * when them don't set any values
     */
    protected $validateRules = [
        'title' => 'required|unique:posts',
        'content' => 'required'
    ];
    
    /**
     * Set validation rule for create action only 
     */
    protected $validateCreateRules = [];
    
    /**
     * Set validation rule for update action only
     */
    protected $validateUpdateRules = [];
    
    /**
     * Use to generate form inputs on view
     */
    protected $formFields = [
        [
            'name' => 'title',
            'type' => 'text',
            'label' => 'Title: ',
            'placeholder' => 'Enter the title ...'
        ],
        [
            'name' => 'content',
            'type' => 'textarea',
            'label' => 'Content: ',
            'placeholder' => 'Enter the content here ...'
        ]
    ];
    
    /**
     * This function can override to find item 
     * return $result array();
     */
    // public function getSingleRow($id) {
        
    // }
    
    /**
     * This function can override to list iten 
     * return $result array();
     */
    // public function getMultipleRows() {
        
    // }
}
