<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8d62d891bfab3b0fdd400677de444c6e
{
    public static $files = array (
        '7482dab2ffecd40f156184dbcd63aa6c' => __DIR__ . '/../..',
    );

    public static $prefixLengthsPsr4 = array (
        'o' => 
        array (
            'octoapi\\app\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'octoapi\\app\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit8d62d891bfab3b0fdd400677de444c6e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8d62d891bfab3b0fdd400677de444c6e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8d62d891bfab3b0fdd400677de444c6e::$classMap;

        }, null, ClassLoader::class);
    }
}
