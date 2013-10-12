<?php

/**
 * @file
 *
 */

namespace Drupal\cmidemo\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller class for the cmidemo module.
 */
class CMIDemoController extends ControllerBase {

  /**
   * Hello callback method.
   */
  public function hello() {
    $config = $this->config('cmidemo.settings');

    $hello = $config->get('hello');
    $name = $config->get('name');

    return array(
      '#theme' => 'cmidemo_hello',
      '#hello' => $hello,
      '#name' => $name,
    );
  }

  /**
   * About method callback
   */
  public function about() {
    $config = $this->config('cmidemo.settings');

    $about = $config->get('about');

    return array(
      '#about' => $about,
      '#theme' => 'cmidemo_about',
    );
  }
}
