<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Company extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable, HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'logo',
        'address',
        'town',
        'country',
        'created_by',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_by',
        'deleted_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $user = User::create([
                'name' => $model->name,
                'email' => $model->email,
                'phone_number' => $model->phone_number,
                'company_id' => $model->id,
            ]);

            $role = AppRole::where('name', 'manager')->first();
            $user->assignRole($role);

            $model->created_by = auth()->id();
            $model->saveQuietly();
        });

        static::updated(function ($model) {
            $model->updated_by = auth()->id();
            $model->saveQuietly();
        });

        static::deleting(function ($model) {
            $model->deleted_by = auth()->id();
            $model->deleted_at = now();
            $model->save();
        });
    }

    public function offices()
    {
        return $this->hasMany(ClientOffices::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
