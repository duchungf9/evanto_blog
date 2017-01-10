<?php

namespace App\Providers;
use View,File,DB;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
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
                $composer = "App\\Http\\ViewComposers\\".$_ENV['PROJECT_NAME']."\\".$view;
                if(View::exists($fileBlade)){
                    View::composer(
                        VIEW_FRONT.'ViewComposers.'.$view,
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

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
