<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitde0a4d5b6cccb9f8e8ef460ebcbbe445
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Amalgama\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Amalgama\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitde0a4d5b6cccb9f8e8ef460ebcbbe445::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitde0a4d5b6cccb9f8e8ef460ebcbbe445::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
