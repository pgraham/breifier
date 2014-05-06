<?php
/*
 * Copyright (c) 2013, Philip Graham
 * All rights reserved.
 *
 *
 * This file is part of breifier. For the full copyright and license information
 * please view the LICENSE file that was distributed with this source code.
 */
namespace zpt\breifier;

use PHPUnit_Framework_TestCase;

/**
 * Breifier runner.
 *
 * @author Philip Graham <philip@zeptech.ca>
 */
class Breifier {

	private $target;

	public function __construct($siteRoot) {
		$this->target = getcwd() . '/target';
	}

	public function run() {
		if (file_exists($this->target)) {
			exec("rm -r $this->target");
		}
		mkdir($this->target, 0755, true);
	}

	public function setTarget($target) {
		$this->target = $target;
	}
}
