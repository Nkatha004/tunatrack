<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Utils\AppUtils;

class Vehicle extends Model
{
    protected $fillable = [
        'registration_number',
        'make',
        'model',
        'color',
        'company_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'deleted_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = auth()->id();
            // Check if logged-in user is not admin, then assign their company
            if (!AppUtils::isAdmin()) {
                $model->company_id = auth()->user()->company_id;
            }
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

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
