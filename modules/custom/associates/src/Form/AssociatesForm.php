<?php

namespace Drupal\associates_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\File\FileSystemInterface;

class AssociatesForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'associates_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, FileSystemInterface $file_system = NULL) {
    $form['excel_file'] = [
      '#type' => 'file',
      '#title' => $this->t('Upload Excel file'),
      '#description' => $this->t('Upload an Excel file in .xls or .xlsx format.'),
      '#upload_validators' => [
        'file_validate_extensions' => ['xls xlsx'],
      ],
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // A validação será tratada automaticamente pelo '#upload_validators'.
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state, FileSystemInterface $file_system = NULL) {
    $file = $form_state->getValue('excel_file');

    if ($file) {
      // Define the target directory for upload (upload_excel)
      $destination = 'public://upload_excel/';

      // Create the directory if it doesn't exist
      if (!file_exists($destination)) {
        $file_system->mkdir($destination, 0775, TRUE);
      }

      // Set the destination for the uploaded file
      $file->setDestination($destination . $file->getFilename());

      // Move and save the file to the destination directory
      $file->save();

      // Set the file as permanent
      $file->setPermanent();

      // Save the file
      $file->save();

      // Display a success message
      $this->messenger()->addMessage($this->t('File uploaded successfully.'));
    } else {
      // Display an error message if no file is uploaded
      $this->messenger()->addMessage($this->t('File upload failed.'), 'error');
    }
  }

}