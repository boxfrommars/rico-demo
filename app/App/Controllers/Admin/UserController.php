<?php
/**
 * @author Dmitry Groza <boxfrommars@gmail.com>
 */

namespace App\Controllers\Admin;


use App\Entities\User;
use Rutorika\Dashboard\Controllers\CrudController;

class UserController extends CrudController {

    protected $_entity = '\App\Entities\User';
    protected $_name = 'user';
    protected $_rules = [
        'username' => 'required|alpha_dash|unique:users,username',
        'email'    => 'required|email|unique:users,email',
        'password' => 'min:4',
    ];
    protected $_updateRules = [
        'username' => 'required|alpha_dash|unique:users,username,%id%',
        'email'    => 'required|email|unique:users,email,%id%',
        'password' => 'min:4',
    ];
    protected $_afterSaveRoute = 'self'; // 'self' (default) | 'index' | 'parent'
    protected $_afterDeleteRoute = 'index'; // 'parent' (default) | 'index'

    protected function _getInput()
    {
        $input = \Input::all();

        if (!empty($input['password'])) {
            $validator = \Validator::make($input, ['password' => $this->_rules['password']]); // препроверка теми же рулзами, что и дальше (мы не можем проверять хеш)
            if (!$validator->fails()) {
                $input['password'] = \App::make('hash')->make($input['password']); // если передан пароль, то превращаем его в хеш
            }
        } else {
            unset($input['password']);
        }

        // т.к. неотмеченные чекбоксы не передаются, то фиксим это поведение, ставя умолчанием неотмеченность
        return array_merge(['confirmed' => false], $input);
    }

    /**
     * Обновляем связи многие ко многим
     *
     * @param User $user
     * @param array $input
     */
    protected function _onEntitySaved($user, $input = []) {

        $user->roles()->sync(\Input::get('user_roles', []));
    }
}