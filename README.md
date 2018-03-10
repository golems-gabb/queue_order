# Queue Order

## Introduction

This is the module that provide functionality of sorting
queue workers definitions. That causes an effect on queue execution order
during cron run.

## API

No API.

## Config

All weight values of queue workers stored in `order` property
of `queue_order.settings` config object. It contains key - value array,
where key is the id of queue worker, value - the weight value.
  
```yaml
# Example of `queue_order.settings` config object:
order:
  queue_worker_1: 0
  queue_worker_2: -1
  queue_worker_3: 1
  queue_worker_4: 2
``` 
## UI

This module provide functionality without any admin UI.
It should be useful on production.
Use [Queue Order UI](https://www.drupal.org/project/queue_order_ui)
for development process.  
