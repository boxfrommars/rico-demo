<?php

namespace Rico\Auth;

use Zizaco\Entrust\EntrustRole;

/**
 * Rico\Auth\Role
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('auth.model[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust::permission[] $perms
 * @property mixed $permissions
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\Role whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\Role whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\Role whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\Role whereUpdatedAt($value) 
 */
class Role extends EntrustRole
{
    protected $fillable = ['title', 'name'];
}