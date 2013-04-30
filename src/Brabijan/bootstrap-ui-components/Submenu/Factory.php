<?php

namespace Brabijan\TwitterBootstrapUI\Submenu;

use Nette;

class Factory extends Nette\Object {

	/**
	 * @return Control
	 */
	public function create() {
		return new Control;
	}

}