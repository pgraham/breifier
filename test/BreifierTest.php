<?php
/*
 * Copyright (c) 2013, Philip Graham
 * All rights reserved.
 *
 *
 * This file is part of breifier. For the full copyright and license information
 * please view the LICENSE file that was distributed with this source code.
 */
namespace zpt\breifier\test;

use PHPUnit_Framework_TestCase as TestCase;
use zpt\breifier\Breifier;

/**
 * This class tests the core breifier functionality.
 *
 * @author Philip Graham <philip@zeptech.ca>
 */
class BreiferTest extends TestCase {

	private $targetPath;

	protected function setUp() {
		$this->targetPath = __DIR__ . '/target';

		if (file_exists($this->targetPath)) {
			exec("rm -r $this->targetPath");
		}
	}

	public function testTargetCreated() {
		$runner = new Breifier(__DIR__);
		$runner->run();

		$this->assertFileExists($this->targetPath);
		$this->assertTrue(is_writeable($this->targetPath));
	}
}
