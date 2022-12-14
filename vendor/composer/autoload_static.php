<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdaace92908ed9ffd10e6dab56036fc90
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modelo\\' => 7,
        ),
        'G' => 
        array (
            'Grupo4\\Utiles\\' => 14,
        ),
        'C' => 
        array (
            'Control\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modelo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Modelo',
        ),
        'Grupo4\\Utiles\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Control\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Control',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'IdiormMethodMissingException' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormResultSet' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormString' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormStringException' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'ORM' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdaace92908ed9ffd10e6dab56036fc90::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdaace92908ed9ffd10e6dab56036fc90::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdaace92908ed9ffd10e6dab56036fc90::$classMap;

        }, null, ClassLoader::class);
    }
}
