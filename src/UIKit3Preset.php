<?php

namespace cartographr\UIKit3Preset;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Laravel\Ui\Presets\Preset;
use Symfony\Component\Finder\SplFileInfo;

class UIKit3Preset extends Preset
{

  public static function install()
  {

    static::updatePackages();
    static::updateStyles();
    static::updateBootstrapping();
    static::updateWelcomePage();
    static::updatePagination();
    static::removeNodeModules();

  }

  public static function installAuth()
  {

    static::scaffoldController();
    static::scaffoldAuth();

  }

  protected static function updatePackageArray(array $packages)
  {

    return array_merge([

    ],
     Arr::except($packages, [

     ]));

  }

  protected static function updateStyles()
  {

    tap (new Filesystem, function ($filesystem) {
      $filesystem->deleteDirectory(resource_path('sass'));
      $filesystem->delete(public_path('js/app.js'));
      $filesystem->delete(public_path('css/app.css'));

      if(! $filesystem->isDirectory($directory = resource_path('css'))) {
        $filesystem->makeDirectory($directory, 0755, true);
      }
    });

    copy(__DIR__.'/uikit3-stubs/resources/scss/app.scss', resource_path('scss/app.scss'));
  }

  protected static function updateBootstrapping()
  {

    copy(__DIR__.'/uikit3-stubs/webkit.mix.js', base_path('webpack.mix.js'));

    copy(__DIR__.'/uikit3-stubs/resources/bootstrap.js', resource_path('js/bootstrap.js'));

  }

  protected static function updatePagination()
  {

    (new Filesystem)->delete(resource_path('views/vendor/paginate'));

    (new Filesystem)->copyDirectory(__DIR__.'/uikit3-stubs/resources/views/pagination', resource_path('views/vendor/pagination'));

  }

  protected static function updateWelcomePage()
  {

    (new Filesystem)->delete(resource_path('views/welcome.blade.php'));

    copy(__DIR__.'/uikit3-stubs/resources/views/welcome.blade.php', resource_path('views/welcome.blade.php'));

  }

  protected static function scaffoldController()
  {

    if(! is_dir($directory = app_path('Http/Controllers/Auth'))) {
      mkdir($directory, 0755, true);
    }

    $filesystem = new Filesystem;

    collect($filesystem->allFiles(base_path('vendor/laravel/ui/stubs/Auth')))
    ->each(function (SplFileInfo $file) use ($filesystem) {
      $filesystem->copy(
        $file->getPathName(),
        app_path('Http/Controllers/Auth'.Str::replaceLast('.stub', '.php', $file->getFilename()))
      );
    });

  }

  protected static function scaffoldAuth()
  {

    file_put_contents(app_path('Http/Controllers/HomeController.php'), static::compileControllerStub());

    file_put_contents(
      base_path('routes/web.php'),
      "Auth::routes();\n\nRoute::get('/home', 'HomeController@index')->name('home');\n\n",
      FILE_APPEND
      );

      tap(new Filesystem, function($filesystem) {
        $filesystem->copyDirectory(__DIR__.'/uikit3-stubs/resources/views', resource_path('views'));

        collect($filesystem->allFiles(base_path('/vendor/laravel/ui/stubs/migrations')))
        ->each(function (SplFileInfo $file) use ($filesystem) {
          $filesystem->copy(
            $file->getPathName(),
            database_path('migrations/'.$file->getFilename())
          );
        });
      });

  }

  protected static function compileControllerStub()
  {

    return str_replace(
      '{{namespace}}',
      Container::getInstance()->getNameSpace(),
      file_get_contents(__DIR__.'/uikit3-stubs/controllers/HomeController.stub')
    );

  }

}

?>
