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

	public function run() {
		$target = getcwd() . '/target';

		if (file_exists($target)) {
			exec("rm -r $target");
		}
		mkdir($target, 0755, true);
	}
}
