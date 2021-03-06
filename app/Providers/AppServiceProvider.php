<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('Administrator Menu');
            $event->menu->add([
                'text' => __('general.posts'),
                'icon' => 'newspaper-o',
                'submenu' => [
                    [
                        'text' => __('general.posts_view'),
                        'url' => route('posts.index'),
                    ],
                    [
                        'text' => __('general.trashed_posts_view'),
                        'url' => route('posts.trashed'),
                    ],
                    [
                        'text' => __('general.posts_add'),
                        'url' => route('posts.create'),

                    ],
                ],
            ]);   
            $event->menu->add([
                'text' => __('general.categories'),
                'icon' => 'table',
                'permission' => 'CRUD Taxonomy',
                'submenu' => [
                    [
                        'text' => __('general.categories_view'),
                        'url' => route('categories.index'),
                    ],
                    [
                        'text' => __('general.categories_add'),
                        'url' => route('categories.create'),

                    ],
                ],
            ]);
            
            $event->menu->add([
                'text' => __('general.tags'),
                'icon' => 'tags',
                'permission' => 'CRUD Taxonomy',
                'submenu' => [
                    [
                        'text' => __('general.tags_view'),
                        'url' => route('tags.index'),
                    ],
                    [
                        'text' => __('general.tags_add'),
                        'url' => route('tags.create'),

                    ],
                ],
            ]); 
            $event->menu->add([
                'text' => __('general.pages'),
                'icon' => 'file',
                'permission' => 'Administer roles & permissions',
                'submenu' => [
                    [
                        'text' => __('general.pages_view'),
                        'url' => route('pages.index'),
                    ],
                    [
                        'text' => __('general.pages_add'),
                        'url' => route('pages.create'),

                    ],
                ],
            ]);    
       
            $event->menu->add([
                'text' => __('general.users'),
                'icon' => 'user',
                'permission' => 'Administer roles & permissions',
                'submenu' => [
                    [
                        'text' => __('general.users_view'),
                        'url' => route('users.index'),
                    ],
                    [
                        'text' => __('general.roles_view'),
                        'url' => route('roles.index'),

                    ],
                    [
                        'text' => __('general.permissions_view'),
                        'url' => route('permissions.index'),

                    ],
                ],
            ]);        
        });
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
