<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc9edf7c254358394ccb67371016cfc8b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc9edf7c254358394ccb67371016cfc8b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc9edf7c254358394ccb67371016cfc8b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
