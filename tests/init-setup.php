<?php
/**
 * Class Init tests
 *
 * @package Eightshift_Libs\Tests
 */

namespace Eightshift_Libs\Tests;

use PHPUnit\Framework\TestCase;
use Brain\Monkey;

abstract class Init_Test_Case extends TestCase {

  /**
   * Setup method necessary for Brain Monkey to function
   *
   * @return void
   */
  protected function setUp() {
    parent::setUp();
    Monkey\setUp();
  }

  /**
   * Teardown method necessary for Brain Monkey to function
   *
   * @return void
   */
  protected function tearDown() {
    Monkey\tearDown();
    parent::tearDown();
  }
}
