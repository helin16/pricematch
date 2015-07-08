<?php
date_default_timezone_set('UTC');
/**
 * Boostrapper for the Core module
 *
 * @package Core
 * @author  lhe
 */
abstract class SystemCoreAbstract
{
    /**
     * autoloading function
     *
     * @param string $className The class that we are trying to autoloading
     *
     * @return boolean Whether we loaded the class
     */
	public static function autoload($className)
	{
		$base = dirname(__FILE__);
		$autoloadPaths = array(
			$base . '/conf/',
			$base . '/db/',
			$base . '/entity/',
			$base . '/entity/system/',
			$base . '/entity/tools/',
			$base . '/exception/',
			$base . '/utils/'
		);
		foreach ($autoloadPaths as $path)
		{
			if (file_exists($file = trim($path . $className . '.php')))
			{
				require_once $file;
				return true;
			}
		}
		return false;
	}
}
spl_autoload_register(array('SystemCoreAbstract','autoload'));

//REST server
require_once dirname(__FILE__) . '/../3rdParty/RestServer/source/Jacwright/RestServer/RestServer.php';

?>