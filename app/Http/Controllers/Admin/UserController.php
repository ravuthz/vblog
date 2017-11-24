<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\CrudController;

class UserController extends CrudController
{
    public $itemName = 'user';
    public $listName = 'users';
    public $itemPerPage = 1;
    
    public $viewPath = 'admin.user';
    public $modelPath = 'App\User';
    public $routePath = 'admin.user';

    public $validateRules = [
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required'
    ];
    
    /**
     * For lazy view form and list
     * The attribute['name'] is required, for use in action below:
     * - when fields have attribute['list'] it will show in table of items
     * - when fields have attribute['type'] it will show in form to submit data
     */
    public $fields = [
        [
            'list' => 'Name',
            'name' => 'name',
            'type' => 'text',
            'label' => 'Name: ',
            'placeholder' => 'Enter the your full name ...'
        ],
        [
            'list' => 'Email',
            'name' => 'email',
            'type' => 'text',
            'label' => 'Email: ',
            'placeholder' => 'Enter the email address ...'
        ],
        [
            'name' => 'password',
            'type' => 'password',
            'label' => 'Password: ',
            'placeholder' => 'Enter the password'
        ],
        [
            'name' => 'password_confirmation',
            'type' => 'password',
            'label' => 'Confirm Password: ',
            'placeholder' => 'Enter the confirm password'
        ]
    ];
    
    public function __construct() {
        parent::__construct();
        View::share('pageTitle', 'User listing');
    }
    
}
