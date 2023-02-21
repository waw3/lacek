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

            'admin.dashboard.index',

            'admin.users.index',
            'admin.users.edit',
            'admin.users.show',
            'admin.users.update',
            'admin.users.create',
            'admin.users.store',
            'admin.users.destroy',
            'admin.users.view.deactive',
            'admin.users.view.deleted',

            'admin.roles.index',
            'admin.roles.edit',
            'admin.roles.show',
            'admin.roles.update',
            'admin.roles.create',
            'admin.roles.store',
            'admin.roles.destroy',

            'admin.permissions.index',
            'admin.permissions.edit',
            'admin.permissions.show',
            'admin.permissions.update',
            'admin.permissions.create',
            'admin.permissions.store',
            'admin.permissions.destroy',

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
