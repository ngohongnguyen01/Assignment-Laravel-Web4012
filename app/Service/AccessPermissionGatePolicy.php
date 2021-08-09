<?php
namespace App\Service;


use Illuminate\Support\Facades\Gate;

class AccessPermissionGatePolicy
{
    public function setGatePermissionAcces()
    {
        $this->setGateCategory();
        $this->setGatePosts();
        $this->setGatePermission();
        $this->setGateBanner();
        $this->setGateColor();
        $this->setGateProduct();
        $this->setGateRole();
        $this->setGateSetting();
        $this->setGateSize();
        $this->setGateUser();
        $this->setAdminAcces();
        $this->setGateComment();
    }

    public function setAdminAcces()
    {
        Gate::define('list-admin', 'App\Policies\BackendAdminPolicy@setAdminBackend');
    }

    public function setGateComment()
    {
        Gate::define('list-comments','App\Policies\CommentPolicy@listComment');
        Gate::define('show-comments','App\Policies\CommentPolicy@showComment');
        Gate::define('delete-comments','App\Policies\CommentPolicy@deleteComment');
        Gate::define('update-comments','App\Policies\CommentPolicy@updateComment');
    }

    public function setGateCategory()
    {
        Gate::define('list-category', 'App\Policies\CategoryPolicy@viewAny');
        Gate::define('add-category', 'App\Policies\CategoryPolicy@create');
        Gate::define('edit-category', 'App\Policies\CategoryPolicy@update');
        Gate::define('delete-category', 'App\Policies\CategoryPolicy@delete');

    }

    public function setGatePosts()
    {
        Gate::define('list-posts', 'App\Policies\PostsPolicy@viewAny');
        Gate::define('add-posts', 'App\Policies\PostsPolicy@create');
        Gate::define('edit-posts', 'App\Policies\PostsPolicy@update');
        Gate::define('delete-posts', 'App\Policies\PostsPolicy@delete');
        Gate::define('detail-posts', 'App\Policies\PostsPolicy@view');

    }

    public function setGateUser()
    {
        Gate::define('list-users', 'App\Policies\UserPolicy@viewAny');
        Gate::define('add-users', 'App\Policies\UserPolicy@create');
        Gate::define('edit-users', 'App\Policies\UserPolicy@update');
        Gate::define('delete-users', 'App\Policies\UserPolicy@delete');

    }


    public function setGateBanner()
    {
        Gate::define('list-banners', 'App\Policies\BannerPolicy@viewAny');
        Gate::define('add-banners', 'App\Policies\BannerPolicy@create');
        Gate::define('edit-banners', 'App\Policies\BannerPolicy@update');
        Gate::define('delete-banners', 'App\Policies\BannerPolicy@delete');
    }

    public function setGateColor()
    {
        Gate::define('list-colors', 'App\Policies\ColorPolicy@viewAny');
        Gate::define('add-colors', 'App\Policies\ColorPolicy@create');
        Gate::define('edit-colors', 'App\Policies\ColorPolicy@update');
        Gate::define('delete-colors', 'App\Policies\ColorPolicy@delete');
    }

    public function setGatePermission()
    {
        Gate::define('list-permission', 'App\Policies\PermissionPolicy@viewAny');
        Gate::define('add-permission', 'App\Policies\PermissionPolicy@create');
        Gate::define('edit-permission', 'App\Policies\PermissionPolicy@update');
        Gate::define('delete-permission', 'App\Policies\PermissionPolicy@delete');
    }

    public function setGateProduct()
    {
        Gate::define('list-products', 'App\Policies\ProductPolicy@viewAny');
        Gate::define('add-products', 'App\Policies\ProductPolicy@create');
        Gate::define('edit-products', 'App\Policies\ProductPolicy@update');
        Gate::define('delete-products', 'App\Policies\ProductPolicy@delete');
        Gate::define('detail-products', 'App\Policies\ProductPolicy@view');
    }

    public function setGateRole()
    {
        Gate::define('list-roles', 'App\Policies\RolePolicy@viewAny');
        Gate::define('add-roles', 'App\Policies\RolePolicy@create');
        Gate::define('edit-roles', 'App\Policies\RolePolicy@update');
        Gate::define('delete-roles', 'App\Policies\RolePolicy@delete');
    }

    public function setGateSetting()
    {
        Gate::define('list-settings', 'App\Policies\SettingPolicy@viewAny');
        Gate::define('add-settings', 'App\Policies\SettingPolicy@create');
        Gate::define('edit-settings', 'App\Policies\SettingPolicy@update');
        Gate::define('delete-settings', 'App\Policies\SettingPolicy@delete');
    }

    public function setGateSize()
    {
        Gate::define('list-sizes', 'App\Policies\SizePolicy@viewAny');
        Gate::define('add-sizes', 'App\Policies\SizePolicy@create');
        Gate::define('edit-sizes', 'App\Policies\SizePolicy@update');
        Gate::define('delete-sizes', 'App\Policies\SizePolicy@delete');
    }


}

?>
