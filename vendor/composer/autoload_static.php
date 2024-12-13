<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9f8cbc5b7ec883055ee7cb4d6b0cc4bd
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Model\\' => 6,
        ),
        'C' => 
        array (
            'Controller\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9f8cbc5b7ec883055ee7cb4d6b0cc4bd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9f8cbc5b7ec883055ee7cb4d6b0cc4bd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9f8cbc5b7ec883055ee7cb4d6b0cc4bd::$classMap;

        }, null, ClassLoader::class);
    }
}