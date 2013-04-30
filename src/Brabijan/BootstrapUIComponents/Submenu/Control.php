<?php

namespace Brabijan\BootstrapUIComponents\Submenu;

use Nette;

class Control extends Nette\Application\UI\Control
{

	/** @var Section[] */
	private $sections = array();

	/** @var Section */
	private $currentSection;

	/** @var Nette\Localization\ITranslator */
	private $translator = NULL;

	/** @var bool */
	private $render = FALSE;



	/**
	 * Adds section to submenu
	 *
	 * @param string $name
	 * @return Section
	 */
	public function addSection($name)
	{
		$this->sections[] = $this->currentSection = new Section($name, $this->translator);
		$this->setVisibility(TRUE);

		return $this->currentSection;
	}



	/**
	 * Adds item to current selection
	 *
	 * @param string $destination
	 * @param string $text
	 * @param array $args
	 * @return Item
	 */
	public function addItem($destination, $text, $args = array())
	{
		return $this->currentSection->addItem($destination, $text, $args);
	}



	/**
	 * @param bool $visibility
	 */
	public function setVisibility($visibility)
	{
		$this->render = $visibility;
	}



	/**
	 * @return bool
	 */
	public function getVisibility()
	{
		return $this->render;
	}



	/**
	 * @param Nette\Localization\ITranslator $translator
	 */
	public function setTranslator(Nette\Localization\ITranslator $translator)
	{
		$this->translator = $translator;
	}



	/**
	 *
	 */
	public function render()
	{
		$this->template->setFile(__DIR__ . '/Control.latte');
		$this->template->isVisible = $this->getVisibility();
		$this->template->submenu = $this->sections;
		$this->template->render();
	}
}