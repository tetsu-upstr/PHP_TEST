<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc4e7f68700dd21e7ac71d0f15f4b7ad4
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc4e7f68700dd21e7ac71d0f15f4b7ad4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc4e7f68700dd21e7ac71d0f15f4b7ad4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
