<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'permission_name',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'permission_roles');
    }

}
