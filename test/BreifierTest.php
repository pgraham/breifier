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
	private $customTarget;

	protected function setUp() {
		$this->targetPath = __DIR__ . '/target';
		$this->customTarget = __DIR__ . '/target-custom';

		if (file_exists($this->targetPath)) {
			exec("rm -r $this->targetPath");
		}

		if (file_exists($this->customTarget)) {
			exec("rm -r $this->customTarget");
		}
	}

	/**
	 * @expectedException PHPUnit_Framework_Error_Warning
	 */
	public function testNoSiteRoot() {
		$runner = new Breifier();
	}

	public function testTargetCreated() {
		$runner = new Breifier(__DIR__);
		$runner->run();

		$this->assertFileExists($this->targetPath);
		$this->assertTrue(is_writeable($this->targetPath));
	}

	public function testSpecifyTargetAbsolute() {
		$runner = new Breifier(__DIR__);

		$runner->setTarget($this->customTarget);
		$runner->run();

		$this->assertFileExists($this->customTarget);
		$this->assertTrue(is_writeable($this->customTarget));
	}
}
