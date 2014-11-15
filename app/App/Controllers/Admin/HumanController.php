<?php
/**
 * @author Dmitry Groza <boxfrommars@gmail.com>
 */

namespace App\Controllers\Admin;

use Rutorika\Dashboard\Controllers\CrudController;

class HumanController extends CrudController {

    protected $_entity = '\App\Entities\Human';
    protected $_name = 'human';
    protected $_rules = [
        'title' => 'required',
        'bio'    => 'required',
        'height' => 'numeric',
    ];
    protected $_afterSaveRoute = 'self'; // 'self' (default) | 'index' | 'parent'
    protected $_afterDeleteRoute = 'index'; // 'parent' (default) | 'index'
}