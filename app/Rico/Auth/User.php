<?php
namespace Rico\Auth;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;

/**
 * Rico\Auth\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust::role[] $roles
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $confirmation_code
 * @property string $remember_token
 * @property boolean $confirmed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User whereConfirmationCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User whereConfirmed($value)
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User whereUpdatedAt($value)
 */
class User extends \Eloquent implements UserInterface, RemindableInterface, ConfideUserInterface
{
    use ConfideUser;
    use HasRole;

    protected $table = 'users';
    protected $hidden = ['password', 'remember_token'];
}
