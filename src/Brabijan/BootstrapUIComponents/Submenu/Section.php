<?php

namespace Brabijan\BootstrapUIComponents\Submenu;

use Nette;

class Section extends Nette\Object
{

	/** @var Item[] */
	public $items = array();

	/** @var string */
	private $sectionName;

	/** @var Nette\Localization\ITranslator */
	private $translator;



	/**
	 * @param string $sectionName
	 * @param Nette\Localization\ITranslator $translator
	 */
	public function __construct($sectionName, $translator)
	{
		$this->sectionName = $sectionName;
		$this->translator = $translator;
	}



	/**
	 * @return string
	 */
	public function getSectionName() {
		return $this->translator instanceof Nette\Localization\ITranslator ? $this->translator->translate($this->sectionName) : $this->sectionName;
	}



	/**
	 * @param string $destination
	 * @param string $text
	 * @param array $args
	 * @return Item
	 */
	public function addItem($destination, $text, $args = array())
	{
		if ($this->translator != NULL) {
			$text = $this->translator->translate($text);
		}

		$item = new Item();
		$item->setDestination($destination);
		$item->setText($text);
		$item->setArguments($args);
		$this->items[] = $item;

		return $item;
	}

}