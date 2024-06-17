<?php

namespace Drupal\spreadsheets\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Messenger\MessengerInterface;

/**
 * Configure javali_googlesheets settings for this site.
 */
class GoogleSheetsConfigForm extends ConfigFormBase {

  /**
   * The Config Factory Service.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The Messenger Service.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  protected $messenger;

  /**
   * Create a new Report URI Controller.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $configFactory
   *   The Config Factory Service.
   * @param \Drupal\Core\Messenger\MessengerInterface|null $messenger
   *   The Messenger service.
   */
  public function __construct(ConfigFactoryInterface $configFactory, MessengerInterface $messenger) {
    $this->configFactory = $configFactory;
    $this->messenger = $messenger;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('messenger')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'spreadsheets_google_sheets_config';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'spreadsheets.google_sheets_config',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('spreadsheets.google_sheets_config');

    $form['sheet_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Insert Sheet id here'),
      '#required' => TRUE,
      '#default_value' => $config->get('sheet_id'),
    ];

    $form['sheet_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Insert Sheet Name here'),
      '#description' => ('format ex: Sheet1'),
      '#default_value' => $config->get('sheet_name'),
      '#required' => TRUE,
    ];

    $form['range'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Insert Range here'),
      '#description' => ('format ex: A1:C2'),
      '#required' => TRUE,
      '#default_value' => $config->get('range'),
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->configFactory->getEditable('spreadsheets.google_sheets_config');
    $config->set('sheet_id', $form_state->getValue('sheet_id'));
    $config->set('range', $form_state->getValue('range'));
    $config->set('sheet_name', $form_state->getValue('sheet_name'));
    $config->save();
    $this->messenger->addStatus($this->t('The Configuration has been saved'));
  }

}
