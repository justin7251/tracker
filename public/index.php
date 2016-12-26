<?php
use Phalcon\Di\FactoryDefault;
use Phalcon\Loader;


error_reporting(E_ALL);

//debug
(new Phalcon\Debug)->listen();

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');


try {

    /**
     * The FactoryDefault Dependency Injector automatically registers
     * the services that provide a full stack framework.
     */
    $di = new FactoryDefault();

    /**
     * Read services
     */
    include APP_PATH . "/config/services.php";

    /**
     * Get config service for use in inline setup below
     */
    $config = $di->getConfig();

    $loader = new Loader();
    /**
     * We're a registering a set of directories taken from the configuration file
     */
    $loader->registerDirs(
        [
            $config->application->controllersDir,
            $config->application->modelsDir,
            $config->application->formsDir
        ]
    )->register();


    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}