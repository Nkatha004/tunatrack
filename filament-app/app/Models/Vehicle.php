<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

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

        static::created(function ($model) {
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

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
