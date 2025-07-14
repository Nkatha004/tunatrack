<?php

namespace App\Utils;

class AppPermissions
{
    // roles permissions
    const CREATE_ROLES_PERMISSION = 'create-roles';
    const READ_ROLES_PERMISSION = 'read-roles';
    const UPDATE_ROLES_PERMISSION = 'update-roles';
    const DELETE_ROLES_PERMISSION = 'delete-roles';
    const RESTORE_ROLES_PERMISSION = 'restore-roles';
    
    // users
    const CREATE_USERS_PERMISSION = 'create-users';
    const READ_USERS_PERMISSION = 'read-users';
    const UPDATE_USERS_PERMISSION = 'update-users';
    const DELETE_USERS_PERMISSION = 'delete-users';
    const RESTORE_USERS_PERMISSION = 'restore-users';

    // audits permissions
    const CREATE_AUDITS_PERMISSION = 'create-audits';
    const READ_AUDITS_PERMISSION = 'read-audits';
    const UPDATE_AUDITS_PERMISSION = 'update-audits';
    const DELETE_AUDITS_PERMISSION = 'delete-audits';
    const RESTORE_AUDITS_PERMISSION = 'restore-audits';

    // companies permissions
    const CREATE_COMPANIES_PERMISSION = 'create-companies';
    const READ_COMPANIES_PERMISSION = 'read-companies';
    const UPDATE_COMPANIES_PERMISSION = 'update-companies';
    const DELETE_COMPANIES_PERMISSION = 'delete-companies';
    const RESTORE_COMPANIES_PERMISSION = 'restore-companies';

    // offices permissions
    const CREATE_OFFICES_PERMISSION = 'create-offices';
    const READ_OFFICES_PERMISSION = 'read-offices';
    const UPDATE_OFFICES_PERMISSION = 'update-offices';
    const DELETE_OFFICES_PERMISSION = 'delete-offices';
    const RESTORE_OFFICES_PERMISSION = 'restore-offices';
}