<?php

namespace Drupal\queue_order\Queue;

use Drupal\Component\Utility\SortArray;
use Drupal\Core\Queue\QueueWorkerManager as CoreQueueWorkerManager;

/**
 * Class QueueWorkerManager.
 *
 * @package Drupal\queue_order\Queue
 */
class QueueWorkerManager extends CoreQueueWorkerManager {

  /**
   * {@inheritdoc}
   */
  public function getDefinitions() {
    $definitions = parent::getDefinitions();
    $weight = \Drupal::config('queue_order.settings')->get('order');
    $weight = empty($weight) ? [] : $weight;
    foreach ($definitions as $key => &$definition) {
      $definition['weight'] = empty($weight[$key]) ? 0 : intval($weight[$key]);
    }
    uasort($definitions, [SortArray::class, 'sortByWeightElement']);
    return $definitions;
  }

}
