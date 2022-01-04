<?php

namespace App\Providers;

use Carbon\Laravel\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadAdminResources();
        $this->loadFrontResources();
    }

    protected function loadAdminResources(): void
    {
        $this->loadViewsFrom(resource_path('themes/admin_default/views'), 'admin');
        $this->loadTranslationsFrom(resource_path('themes/admin_default/lang'), 'admin');
        $this->loadJsonTranslationsFrom(resource_path('themes/admin_default/lang'));
    }

    protected function loadFrontResources(): void
    {
        $this->loadViewsFrom(resource_path('themes/front_default/views'), 'front');
        $this->loadTranslationsFrom(resource_path('themes/front_default/lang'), 'front');
        $this->loadJsonTranslationsFrom(resource_path('themes/front_default/lang'));
    }
}
