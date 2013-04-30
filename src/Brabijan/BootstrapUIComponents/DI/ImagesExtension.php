<?php

namespace Brabijan\BootstrapUIComponents\DI;

use Nette,
	Nette\Config\Compiler,
	Nette\Config\Configurator;

/**
 * @author Jan Brabec <brabijan@gmail.com>
 */
class BootstrapUIExtension extends Nette\Config\CompilerExtension
{

	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();
		$builder->addDefinition($this->prefix('SubmenuFactory'))
			->setClass('Brabijan\BootstrapUIComponents\Submenu\Factory');

	}



	/**
	 * @param Configurator $config
	 * @param string $extensionName
	 */
	public static function register(Configurator $config, $extensionName = 'bootstrapUIExtension')
	{
		$config->onCompile[] = function (Configurator $config, Compiler $compiler) use ($extensionName) {
			$compiler->addExtension($extensionName, new BootstrapUIExtension());
		};
	}

}