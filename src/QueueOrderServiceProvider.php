<?php

namespace Drupal\queue_order;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Drupal\queue_order\Queue\QueueWorkerManager;

/**
 * Class QueueOrderServiceProvider.
 *
 * @package Drupal\queue_order
 */
class QueueOrderServiceProvider extends ServiceProviderBase {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    if ($container->has('plugin.manager.queue_worker')) {
      $container->getDefinition('plugin.manager.queue_worker')
        ->setClass(QueueWorkerManager::class);
    }
  }

}
