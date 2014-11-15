<?php
/**
 * @author Dmitry Groza <boxfrommars@gmail.com>
 */

namespace App\Controllers\Admin;

use Rutorika\Dashboard\Controllers\CrudController;

class PetController extends CrudController {

    protected $_entity = '\App\Entities\Pet';
    protected $_name = 'pet';
    protected $_parentName = 'human';
    protected $_rules = [
        'title'         => 'required',
        'description'   => 'required',
        'human_id'      => 'required|numeric',
    ];
    protected $_afterSaveRoute = 'parent'; // 'self' (default) | 'index' | 'parent'
    protected $_afterDeleteRoute = 'parent'; // 'parent' (default) | 'index'
}