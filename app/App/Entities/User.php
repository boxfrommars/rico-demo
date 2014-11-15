<?php
namespace App\Entities;

use Rutorika\Dashboard\Entities\Entity;

/**
 * Rico\Auth\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust::role[] $roles
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property boolean $confirmed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User whereConfirmed($value)
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\User whereUpdatedAt($value)
 */
class User extends Entity
{
    protected $table = 'users';
    protected $hidden = ['password', 'remember_token'];
    protected $fillable = ['username', 'email', 'password', 'confirmed'];


    public function roles()
    {
        return $this->belongsToMany('\Rico\Auth\Role', 'assigned_roles');
    }
}
