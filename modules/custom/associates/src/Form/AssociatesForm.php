<?php

namespace Drupal\associates_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;
use \Drupal\file\FileInterface;  // Adicione esta linha

/**
 * Defines a form for uploading an Excel file.
 */
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
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['excel_file'] = [
      '#type' => 'file',
      '#title' => $this->t('Upload Excel file'),
      '#description' => $this->t('Upload an Excel file in .xls or .xlsx format.'),
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
    
    $validators = [
      'file_validate_extensions' => ['xls xlsx'],
    ];

    
    $file = file_save_upload('excel_file', $validators, FALSE, 0, FileSystemInterface::EXISTS_REPLACE);

    
    if (!$file) {
      $form_state->setErrorByName('excel_file', $this->t('An Excel file is required.'));
    } else {
      // Store the uploaded file for processing in the submit handler
      $form_state->setValue('excel_file', $file);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Get the file object from form state
    $file = $form_state->getValue('excel_file');

    if ($file) {
      // File upload successful
      $file->setPermanent();
      $file->save();
      $this->messenger()->addMessage($this->t('File uploaded successfully.'));
    } else {
      // File upload failed
      $this->messenger()->addMessage($this->t('File upload failed.'), 'error');
    }
  }

}
