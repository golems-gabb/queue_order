<?php

namespace Drupal\queue_order_definition_fixtures\Plugin\QueueWorker;

use Drupal\Core\Annotation\QueueWorker;

/**
 * Class WorkerB.
 *
 * @package Drupal\queue_order_definition_fixtures\Plugin\QueueWorker
 *
 * @QueueWorker(
 *   id="queue_order_worker_B",
 *   title="Test worker with '1' position",
 *   cron={"time" = 60, "weight" = -50,}
 * )
 */
class WorkerB extends WorkerBase {}