<?php

namespace Drupal\queue_order\Tests\Kernel;

/**
 * Class DefinitionsWithModuleTest.
 *
 * @package Drupal\queue_order\Tests\Kernel
 *
 * @group queue_order
 */
class DefinitionsWithModuleTest extends DefinitionsWithoutModuleTest {

  /**
   * {@inheritdoc}
   */
  public static $modules = ['queue_order_definition_fixtures', 'queue_order'];

  /**
   * Test equality of Queue Worker definition order.
   */
  public function testOrder() {
    $this->assertEquals(
      $this->orderedList,
      array_keys($this->QueueWorkerManager->getDefinitions()),
      $this > t('Order is managed by the module')
    );
  }

}
