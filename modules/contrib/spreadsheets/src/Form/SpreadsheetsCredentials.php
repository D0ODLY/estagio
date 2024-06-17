<?php

namespace Drupal\spreadsheets\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * The SpreadsheetsCredentials form.
 */
class SpreadsheetsCredentials extends ConfigFormBase {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a EntityView.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */

  /**
   * {@inheritdoc}
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager'),
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'spreadsheets.spreadsheetscredentials',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'spreadsheets_credentials';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    if (!(\Drupal::hasService('stream_wrapper.private'))) {
      $form['warning'] = [
        '#markup' => 'Please <a href="https://www.drupal.org/docs/8/modules/skilling/installation/set-up-a-private-file-path" target="_blank">setup the private file system </a>
      to use this module',
      ];
      return $form;
    }

    $config = $this->config('spreadsheets.spreadsheetscredentials');

    $form['credentials_file'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('credentials'),
      '#description' => $this->t('credentials file'),
      '#default_value' => $config->get('credentials_file'),
      '#upload_location' => 'private://',
      '#upload_validators' => [
        'file_validate_extensions' => ['json'],
      ],
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $form_file = $form_state->getValue('credentials_file');
    if (isset($form_file[0]) && !empty($form_file[0])) {
      $file = $this->entityTypeManager->getStorage('file')->load($form_file[0]);
      $file->setPermanent();
      $file->save();
    }

    $this->config('spreadsheets.spreadsheetscredentials')
      ->set('credentials_file', $form_state->getValue('credentials_file'))
      ->save();
  }

}
