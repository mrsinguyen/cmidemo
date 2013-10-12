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
    $hello = $this->config('cmidemo.settings')->get('hello');
    $name = $this->config('cmidemo.settings')->get('name');

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
    $about = $this->config('cmidemo.settings')->get('about');

    return array(
      '#about' => $about,
      '#theme' => 'cmidemo_about',
    );
  }
}
