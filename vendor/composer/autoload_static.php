<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit74f0f19e125cfd03268b7e42ec9f132b
{
    public static $prefixLengthsPsr4 = array (
        3 => 
        array (
            '37065\\Bankasoop\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        '37065\\Bankasoop\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit74f0f19e125cfd03268b7e42ec9f132b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit74f0f19e125cfd03268b7e42ec9f132b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit74f0f19e125cfd03268b7e42ec9f132b::$classMap;

        }, null, ClassLoader::class);
    }
}