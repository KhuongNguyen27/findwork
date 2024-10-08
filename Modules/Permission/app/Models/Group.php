<?php

namespace Modules\Permission\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Permission\Database\factories\GroupFactory;

class Group extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = "groups";
    protected $fillable = ['name'];
    
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'group_role', 'group_id', 'role_id');
    }

    protected static function newFactory(): GroupFactory
    {
        //return GroupFactory::new();
    }
}