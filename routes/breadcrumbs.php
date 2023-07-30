<?php
use Illuminate\Support\Str;
$roles = ['webadmin'];

foreach($roles as $role) {
    Breadcrumbs::for($role . '.dashboard', function ($breadcrumbs) use ($role) {
        $breadcrumbs->push('Dashboard', route($role . '.dashboard'));
    });
    Breadcrumbs::for($role . '.profile', function ($breadcrumbs) use ($role) {
        $breadcrumbs->push('My Profile', route($role . '.profile'));
    });
// Resource routes for admin
    $resources = ['users'];
    foreach ($resources as $resource) {
        Breadcrumbs::register("$role.$resource.index", function ($breadcrumbs) use ($resource, $role) {
            $breadcrumbs->parent("$role.dashboard");
            $breadcrumbs->push(Str::title($resource), route("$role.$resource.index"));
        });

        Breadcrumbs::register("$role.$resource.create", function ($breadcrumbs) use ($resource, $role) {
            $breadcrumbs->parent("$role.$resource.index");
            $breadcrumbs->push('Create');
        });

        Breadcrumbs::register("$role.$resource.edit", function ($breadcrumbs) use ($resource, $role) {
            $breadcrumbs->parent("$role.$resource.index");
            $breadcrumbs->push('Edit');
        });

        Breadcrumbs::register("$role.$resource.show", function ($breadcrumbs) use ($resource, $role) {
            $breadcrumbs->parent("$role.$resource.index");
            $breadcrumbs->push('View');
        });
    }
}
