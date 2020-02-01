<?php


    namespace App\Providers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

abstract class EhdaServiceProvider extends ServiceProvider
{
    protected $directorySeperator = DIRECTORY_SEPARATOR;

    /**
     * Return your package name. e.g. 'gallery'
     *
     * @return string
     */
    abstract protected function getName();

    abstract protected function isApp();
    
    protected function getDir() {
        $reflector = new \ReflectionClass(get_class($this));
        $filename = $reflector->getFileName();
        return dirname($filename) . $this->directorySeperator;
    }

    protected function getNamespace()
    {
        if($this->isApp()){
            return 'App\\' . ucfirst($this->getName()) . '\Controllers';
        }else{
            return 'Domains\\' . ucfirst($this->getName()) . '\Controllers';
        }
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
//        dd($this->getDir() . 'Resources' . $this->directorySeperator . 'Views', "app");
        $this->loadMigrationsFrom($this->getDir() . 'Database' . $this->directorySeperator . 'Migrations');
        $this->loadViewsFrom($this->getDir() . 'Resources' . $this->directorySeperator . 'Views',$this->getName());
        $this->loadTranslationsFrom($this->getDir() . 'resources' . $this->directorySeperator . 'Lang', $this->getName());

        $this->loadRoute('web');
        $this->loadRoute('api');
    }

    protected function loadRoute($type)
    {
        $prefix = ($type == 'web') ? null : $type;
        $middleware = (in_array($type, ['web', 'api'])) ? $type : 'web';

        Route::prefix($prefix)
            ->middleware($middleware)
            ->namespace($this->getNamespace() )
            ->group($this->getDir() . "Routes" . $this->directorySeperator . $type . ".php");
    }
}