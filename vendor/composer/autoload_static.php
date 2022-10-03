<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc60b5b3cca4157b4e3ad4201c056f33c
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Spatie\\PdfToImage\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Spatie\\PdfToImage\\' => 
        array (
            0 => __DIR__ . '/..' . '/spatie/pdf-to-image/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc60b5b3cca4157b4e3ad4201c056f33c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc60b5b3cca4157b4e3ad4201c056f33c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc60b5b3cca4157b4e3ad4201c056f33c::$classMap;

        }, null, ClassLoader::class);
    }
}