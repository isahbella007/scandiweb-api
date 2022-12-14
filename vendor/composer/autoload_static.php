<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf19e7f158996f90d2838429f38f5ab98
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'src\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'src\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitf19e7f158996f90d2838429f38f5ab98::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf19e7f158996f90d2838429f38f5ab98::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf19e7f158996f90d2838429f38f5ab98::$classMap;

        }, null, ClassLoader::class);
    }
}
