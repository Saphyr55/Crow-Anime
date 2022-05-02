<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit9d82f22b4fc13a3ef2f4c406207cd5cf
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit9d82f22b4fc13a3ef2f4c406207cd5cf', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit9d82f22b4fc13a3ef2f4c406207cd5cf', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit9d82f22b4fc13a3ef2f4c406207cd5cf::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
