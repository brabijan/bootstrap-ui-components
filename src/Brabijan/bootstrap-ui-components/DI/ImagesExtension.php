<?php

namespace Brabijan\TwitterBootstrapUI\DI;

use Nette,
	Nette\Config\Compiler,
	Nette\Config\Configurator;

/**
 * @author Jan Brabec <brabijan@gmail.com>
 */
class TwitterBootstrapUIExtension extends Nette\Config\CompilerExtension
{

	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();
		$builder->addDefinition($this->prefix('SubmenuFactory'))
			->setClass('Brabijan\TwitterBootstrapUI\Submenu\Factory');

	}



	/**
	 * @param Configurator $config
	 * @param string $extensionName
	 */
	public static function register(Configurator $config, $extensionName = 'twitterBootstrapUIExtension')
	{
		$config->onCompile[] = function (Configurator $config, Compiler $compiler) use ($extensionName) {
			$compiler->addExtension($extensionName, new TwitterBootstrapUIExtension());
		};
	}

}