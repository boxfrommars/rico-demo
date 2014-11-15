<?php

namespace App\Controllers\Admin;

use Rutorika\Dashboard\Controllers\CrudController;

class RoleController extends CrudController
{
    protected $_entity = '\Rico\Auth\Role';
    protected $_name = 'role';
    protected $_rules = [
        'title' => 'required',
        'name' => 'required|between:4,128'
    ];
}