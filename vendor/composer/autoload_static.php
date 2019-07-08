<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2000a17b07e6a94d60b0cfc721601686
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
        '3a37ebac017bc098e9a86b35401e7a68' => __DIR__ . '/..' . '/mongodb/mongodb/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'adrianfalleiro\\' => 15,
        ),
        'W' => 
        array (
            'WetekChallenge\\Service\\' => 23,
            'WetekChallenge\\Repo\\' => 20,
            'WetekChallenge\\Controller\\Cli\\' => 30,
            'WetekChallenge\\' => 15,
        ),
        'S' => 
        array (
            'Slim\\' => 5,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Container\\' => 14,
        ),
        'M' => 
        array (
            'MongoDB\\' => 8,
        ),
        'I' => 
        array (
            'Interop\\Container\\' => 18,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
            'FaaPz\\PDO\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'adrianfalleiro\\' => 
        array (
            0 => __DIR__ . '/..' . '/adrianfalleiro/slim-cli-runner/src',
        ),
        'WetekChallenge\\Service\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Service',
        ),
        'WetekChallenge\\Repo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Repository',
        ),
        'WetekChallenge\\Controller\\Cli\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Controller/Cli',
        ),
        'WetekChallenge\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Slim\\' => 
        array (
            0 => __DIR__ . '/..' . '/slim/slim/Slim',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'MongoDB\\' => 
        array (
            0 => __DIR__ . '/..' . '/mongodb/mongodb/src',
        ),
        'Interop\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/container-interop/container-interop/src/Interop/Container',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'FaaPz\\PDO\\' => 
        array (
            0 => __DIR__ . '/..' . '/faapz/pdo/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2000a17b07e6a94d60b0cfc721601686::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2000a17b07e6a94d60b0cfc721601686::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit2000a17b07e6a94d60b0cfc721601686::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
