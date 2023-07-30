<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Str;
class SettingsViewComposer {

    public $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function compose(View $view) {
        
        $route = request()->route() ? request()->route()->getName() : '';
        
        $view->with('row_title', $this->getRowTitle($route));
        $view->with('route_name', $route);
    }

    protected function getRowTitle($route)
    {
        if(request()->route() && request()->route()->getPrefix() == '/webadmin') {
            $route = str_replace('webadmin.', '', $route);
        }

        $this->sanitizeTitle($route);
        
        return $route;
    }

    protected function sanitizeTitle(&$route)
    {

        $replace_titles = [
            'dashboard' => 'Home',
            'users.index' => 'Users List',
            'users.create' => 'Add User',
            'users.edit' => 'Edit User',
        ];

        $route = @$replace_titles[$route] ?: $route;        

        $route = Str::title(str_replace(['.', '_'], [' ', ' '], $route));
    }
}
