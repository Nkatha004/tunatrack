<?php

namespace App\Utils;

use Illuminate\Database\Schema\Blueprint;

class AppUtils
{
    const ADMIN_MANAGEMENT_NAVIGATION_GROUP = 'My Company';
    const ACCESS_MANAGEMENT_NAVIGATION_GROUP = 'Access Management';
    const PARCEL_MANAGEMENT_NAVIGATION_GROUP = 'Parcel Management';

    public static function defaultTableColumns(Blueprint $table) // applied to all tables
    {
        $table->id();
        $table->timestamps();
        $table->softDeletes();
        $table->tinyInteger('status')->default(1);
        $table->tinyInteger('archive')->default(0);
        $table->unsignedBigInteger('created_by')->nullable();
        $table->unsignedBigInteger('updated_by')->nullable();
        $table->unsignedBigInteger('deleted_by')->nullable();

        // foreign keys
        $table->foreign('created_by')->references('id')->on('users');
        $table->foreign('updated_by')->references('id')->on('users');
        $table->foreign('deleted_by')->references('id')->on('users');

        return $table;
    }

    public static function isAdmin(): bool
    {
        return auth()->check() && auth()->user()->hasRole('admin');
    }
}