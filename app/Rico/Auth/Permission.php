<?php

namespace Rico\Auth;

use Zizaco\Entrust\EntrustPermission;

/**
 * Rico\Auth\Permission
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust::role[] $roles
 * @property integer $id
 * @property string $name
 * @property string $display_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\Permission whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\Permission whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\Permission whereDisplayName($value) 
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\Permission whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Rico\Auth\Permission whereUpdatedAt($value) 
 */
class Permission extends EntrustPermission
{

}