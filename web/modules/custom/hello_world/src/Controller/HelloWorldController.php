<?php

declare(strict_types=1);

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Hello World routes.
 */
final class HelloWorldController extends ControllerBase {

  /**
   * Displays a message.
   */
  public function salute(): array {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('Yay, it works!'),
    ];

    return $build;
  }

}
