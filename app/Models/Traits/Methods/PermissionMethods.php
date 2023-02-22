<?php namespace App\Models\Traits\Methods;

/**
 * Trait PermissionMethods.
 */
trait PermissionMethods
{
    /**
     * defaultPermissions function.
     *
     * @access public
     * @static
     * @return void
     */
    public static function defaultPermissions()
    {

        return [

            'dashboard.index',

            'dashboard.users.index',
            'dashboard.users.edit',
            'dashboard.users.show',
            'dashboard.users.update',
            'dashboard.users.create',
            'dashboard.users.store',
            'dashboard.users.destroy',
            'dashboard.users.view.deactive',
            'dashboard.users.view.deleted',

            'dashboard.roles.index',
            'dashboard.roles.edit',
            'dashboard.roles.show',
            'dashboard.roles.update',
            'dashboard.roles.create',
            'dashboard.roles.store',
            'dashboard.roles.destroy',

            'dashboard.permissions.index',
            'dashboard.permissions.edit',
            'dashboard.permissions.show',
            'dashboard.permissions.update',
            'dashboard.permissions.create',
            'dashboard.permissions.store',
            'dashboard.permissions.destroy',

            'dashboard.blogs.index',
            'dashboard.blogs.edit',
            'dashboard.blogs.show',
            'dashboard.blogs.update',
            'dashboard.blogs.create',
            'dashboard.blogs.store',
            'dashboard.blogs.destroy',

        ];
    }


    /**
     * @return string
     */
    public function getNameLabelAttribute()
    {
        return ucwords(str_replace('.', ' ', $this->name));
    }
}
