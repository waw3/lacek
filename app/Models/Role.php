<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;
use App\Models\Traits\Attributes\RoleAttributes;
use App\Models\Traits\Methods\RoleMethods;

class Role extends SpatieRole
{
    use HasFactory, RoleAttributes, RoleMethods;
}
