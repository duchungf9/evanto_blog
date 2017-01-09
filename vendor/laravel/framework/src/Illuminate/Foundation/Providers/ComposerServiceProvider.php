<?php

namespace Illuminate\Foundation\Providers;

use Illuminate\Support\Composer;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('composer', function ($app) {
            return new Composer($app['files'], $app->basePath());
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['composer'];
    }

    public function boot(){
        $fileComposers = File::allFiles(app_path()."/Http/ViewComposers/".$_ENV['PROJECT_NAME']);
        $aFileComposers = [];
        foreach($fileComposers as $viewComposer){
            $extension = File::extension($viewComposer->getFilename());
            if($extension=='php'){
                $fileName = str_replace('.'.$extension,'',$viewComposer->getFilename());
                $aFileComposers[] = $fileName;
            }
        }
        if(count($aFileComposers)>0){
            foreach($aFileComposers as $view){
                $fileBlade = VIEW_FRONT.'ViewComposers.'.$view;

                $composer = "SCMS\\Http\\ViewComposers\\".$_ENV['PROJECT_NAME']."\\".$view;
                if(View::exists($fileBlade)){
                    View::composer(
                        VIEW_FRONT.'viewComposers.'.$view,
                        $composer
                    );
                }else{
                    View::composer(
                        VIEW_FRONT.'viewComposers.'.$view,
                        $composer
                    );
                }

            }
        }
    }
}
