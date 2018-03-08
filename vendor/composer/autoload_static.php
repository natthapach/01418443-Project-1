<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6ee2e31461474f11927e1b95dbf26c16
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Service\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Service\\' => 
        array (
            0 => __DIR__ . '/../..' . '/service',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6ee2e31461474f11927e1b95dbf26c16::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6ee2e31461474f11927e1b95dbf26c16::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
