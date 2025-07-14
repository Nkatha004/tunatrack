<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppRole extends Role implements Auditable
{
    use \OwenIt\Auditing\Auditable, HasFactory;
}
