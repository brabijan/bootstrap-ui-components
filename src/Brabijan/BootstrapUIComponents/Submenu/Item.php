<?php

namespace Brabijan\BootstrapUIComponents\Submenu;

use Nette;

class Item extends Nette\Object
{

	/** @var bool */
	public $render = TRUE;

	/** @var string */
	public $destination;

	/** @var string */
	public $text;

	/** @var array */
	public $attributes = array();

	/** @var array */
	public $args = array();



	/**
	 * @param $destination
	 * @return $this provide fluent interface
	 */
	public function setDestination($destination)
	{
		$this->destination = $destination;

		return $this;
	}



	/**
	 * @param $text
	 * @return $this provide fluent interface
	 */
	public function setText($text)
	{
		$this->text = $text;

		return $this;
	}



	/**
	 * @param array $args
	 * @return $this provide fluent interface
	 */
	public function setArguments(array $args)
	{
		$this->args = $args;

		return $this;
	}



	/**
	 * @param $condition
	 * @return $this provide fluent interface
	 */
	public function addCondition($condition)
	{
		if (!$condition)
			$this->render = FALSE;

		return $this;
	}



	/**
	 * @param $name
	 * @param $value
	 * @return $this provide fluent interface
	 */
	public function setAttribute($name, $value)
	{
		$this->attributes[$name] = $value;

		return $this;
	}

}