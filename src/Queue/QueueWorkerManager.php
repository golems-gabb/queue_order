<?php

namespace Drupal\queue_order\Queue;

use Drupal\Component\Utility\SortArray;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Queue\QueueWorkerManager as CoreQueueWorkerManager;

/**
 * Class QueueWorkerManager.
 *
 * @package Drupal\queue_order\Queue
 */
class QueueWorkerManager extends CoreQueueWorkerManager {

  /**
   * The module config.
   *
   * @var \Drupal\Core\Config\ImmutableConfig
   */
  protected $config;

  /**
   * Constructs an QueueWorkerManager object.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config
   *   The module configs.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler, ConfigFactoryInterface $config) {
    parent::__construct($namespaces, $cache_backend, $module_handler);
    $this->config = $config->get('queue_order.settings');
  }

  /**
   * {@inheritdoc}
   */
  public function getDefinitions() {
    $definitions = parent::getDefinitions();
    $weight = $this->config->get('order');
    $weight = empty($weight) ? [] : $weight;
    foreach ($definitions as $key => &$definition) {
      $definition['cron']['weight'] = empty($definition['cron']['weight']) ? 0 : intval($definition['cron']['weight']);
      $definition['weight'] = empty($weight[$key]) ? $definition['cron']['weight'] : intval($weight[$key]);
    }
    uasort($definitions, [SortArray::class, 'sortByWeightElement']);
    return $definitions;
  }

}
