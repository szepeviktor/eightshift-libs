<?php
/**
 * Class Main tests
 *
 * @package Eightshift_Libs\Tests\Admin
 */

use Brain\Monkey\Functions;
use Brain\Monkey\Filters;

use Eightshift_Libs\Tests\Init_Test_Case;

use Custom_Namespace\Core\Main;
use Eightshift_Libs\Core\Main as LibMain;

/**
 * Class that tests the Main plugin functionality.
 *
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class Main_Tests extends Init_Test_Case {
    /**
   * Initial set up for the test
   */
  public function setUp() {
    parent::setUp();

    $this->main = new Main();

  }

  /**
   * Tear down after test ends
   */
  public function tearDown() {
    parent::tearDown();
  }

  public function test_get_service_classes_exists() {
    $this->assertTrue(
      method_exists($this->main, 'get_service_classes'), 
      'Class does not have method myFunction'
    );
   }

   public function test_get_service_classes_returns_array() {
    $this->assertEquals( gettype( $this->main->get_service_classes() ), 'array' );
   }
}
