<?php 
define("DS",DIRECTORY_SEPARATOR);
define("ROOT_PATH",dirname(__DIR__).DS);
define("APP",ROOT_PATH.'app'.DS);
define("CORE",APP.'Core'.DS);
define("CONFIG",APP.'Config'.DS);
define("CONTROLLERS",APP.'Controllers'.DS);
define("MODELS",APP.'Models'.DS);
define("VIEWS",APP.'Views'.DS);
define("UPLOADS",ROOT_PATH.'public'.DS.'uploads'.DS);

define("VENDOR",ROOT_PATH.'VENDOR'.DS);

// configuration files 
require_once(CONFIG.'config.php');
require_once(CONFIG.'helpers.php');



// autoload all classes 
//$modules = [ROOT_PATH,APP,CORE,VIEWS,CONTROLLERS,MODELS,CONFIG];
//set_include_path(get_include_path(). PATH_SEPARATOR.implode(PATH_SEPARATOR,$modules));
////spl_autoload_register('spl_autoload');
function myAutoload($class) {
    $class = str_replace("\\", DS, $class) . '.php';
    $paths = [
        ROOT_PATH,
        APP,
        CORE,
        VIEWS,
        CONTROLLERS,
        MODELS,
        CONFIG
    ];
    
    foreach ($paths as $path) {
        $file = $path . $class;
        if (file_exists($file)) {
            require_once($file);
            return;
        }
    }
}

spl_autoload_register('myAutoload');
//print_r(explode(PATH_SEPARATOR, get_include_path()));

//require_once(CORE . "App.php");

new App();