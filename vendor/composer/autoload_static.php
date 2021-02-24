<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit25d19e2d4531e713c34f9e35c796f3d5
{
    public static $files = array (
        'cd578b0dcfac42163f60451fd625a89f' => __DIR__ . '/../..' . '/includes/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'crud\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'crud\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit25d19e2d4531e713c34f9e35c796f3d5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit25d19e2d4531e713c34f9e35c796f3d5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit25d19e2d4531e713c34f9e35c796f3d5::$classMap;

        }, null, ClassLoader::class);
    }
}