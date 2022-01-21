<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit188fadd28315afaa2f9361a97d7083eb
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit188fadd28315afaa2f9361a97d7083eb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit188fadd28315afaa2f9361a97d7083eb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit188fadd28315afaa2f9361a97d7083eb::$classMap;

        }, null, ClassLoader::class);
    }
}
