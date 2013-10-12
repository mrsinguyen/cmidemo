<?php

/**
 * @file
 *
 */

namespace Drupal\cmidemo\Form;

use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Config\Context\ContextInterface;
use Drupal\Core\Form\ConfigFormBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Configuration form for cmidemo.
 */
class CMIDemoSettingsForm extends ConfigFormBase {

  /**
   * Constructs a \Drupal\cmidemo\Form\CMIDemoSettingsForm object.
   *
   * @param \Drupal\Core\Config\ConfigFactory $config_factory
   *   The factory for configuration objects.
   * @param \Drupal\Core\Config\Context\ContextInterface $context
   *   The configuration context to use.
   */
  public function __construct(ConfigFactory $config_factory, ContextInterface $context) {
    parent::__construct($config_factory, $context);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('config.context.free')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'cmidemo_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, array &$form_state) {
    $config = $this->configFactory->get('cmidemo.settings');

    $form['hello'] = array(
      '#title' => t('Hello string'),
      '#description' => t('The hello string'),
      '#type' => 'textfield',
      '#default_value' => $config->get('hello'),
    );
    $form['name'] = array(
      '#title' => t('Name'),
      '#description' => t('The personal name'),
      '#type' => 'textfield',
      '#default_value' => $config->get('name'),
    );
    $form['about'] = array(
      '#title' => t('About content'),
      '#description' => t('The about content'),
      '#type' => 'textarea',
      '#default_value' => $config->get('about'),
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, array &$form_state) {
    $config = $this->configFactory->get('cmidemo.settings');

    $config->set('hello', $form_state['values']['hello']);
    $config->set('name', $form_state['values']['name']);
    $config->set('about', $form_state['values']['about']);

    $config->save();

    parent::submitForm($form, $form_state);
  }

}
