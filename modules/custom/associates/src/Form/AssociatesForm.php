<?php

namespace Drupal\associates_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * Defines a form that allows users to upload an Excel file.
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
      '#description' => $this->t('Upload an Excel file to be converted into code.'),
      '#upload_validators' => [
        'file_validate_extensions' => ['xls xlsx'],
      ],
      '#required' => TRUE,
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Upload'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $validators = ['file_validate_extensions' => ['xls xlsx']];
    $file = file_save_upload('excel_file', $validators, FALSE, 0, FILE_EXISTS_REPLACE);

    if ($file) {
      // Move the file to the desired location and process it.
      $directory = 'public://excel_uploads/';
      \Drupal::service('file_system')->prepareDirectory($directory, \Drupal\Core\File\FileSystemInterface::CREATE_DIRECTORY | \Drupal\Core\File\FileSystemInterface::MODIFY_PERMISSIONS);
      $destination = $directory . $file->getFilename();

      try {
        $file = \Drupal::service('file_system')->move($file->getFileUri(), $destination);
        $file_uri = $file->getFileUri();

        // Load the spreadsheet.
        $spreadsheet = IOFactory::load($file_uri);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        // Process the data (this is just a simple example).
        $output = '';
        foreach ($sheetData as $row) {
          $output .= implode(', ', $row) . "\n";
        }

        // Output the result.
        \Drupal::messenger()->addStatus($this->t('File processed successfully.'));
        \Drupal::messenger()->addStatus('<pre>' . $output . '</pre>');
      }
      catch (FileException $e) {
        \Drupal::messenger()->addError($this->t('Failed to upload the file.'));
      }
    }
    else {
      \Drupal::messenger()->addError($this->t('No file was uploaded.'));
    }
  }
}
