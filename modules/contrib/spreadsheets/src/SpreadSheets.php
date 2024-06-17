<?php

namespace Drupal\spreadsheets;

use Google\Service\Exception;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\File\FileSystem;

/**
 * Class for the service  javali_sheets.base .
 *
 * This service enables the creation,  * configuration and data
 * retrieval of a google sheet.
 */
class SpreadSheets {

  /**
   * The EntityTypeManager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The Messenger service.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  protected $messenger;

  /**
   * The file_system service.
   *
   * @var \Drupal\Core\File\FileSystem
   */
  protected $fileSystem;

  /**
   * The Google_Client object.
   *
   * @var \Google_Client
   */
  private $client;

  /**
   * The sheet id from config.
   *
   * @var string
   */
  private $sheetId;

  /**
   * The range from config.
   *
   * @var string
   */
  private $range;

  /**
   * The sheet name from config.
   *
   * @var string
   */
  private $sheetName;

  /**
   * JavaliSheets constructor.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager, ConfigFactoryInterface $config_factory, MessengerInterface $messenger, FileSystem $file_system) {
    $this->entityTypeManager = $entity_type_manager;
    $this->configFactory = $config_factory;
    $this->messenger = $messenger;
    $this->fileSystem = $file_system;

    $config = $this->configFactory->get('spreadsheets.google_sheets_config');
    $this->client = $this->getClient();
    $this->sheetId = $config->get('sheet_id');
    $this->range = $config->get('range');
    $this->sheetName = $config->get('sheet_name');
  }

  /**
   * Function to get the Google client.
   *
   * @return \Google_Client
   *   the Google client
   *
   * @throws \Google\Service\Exception
   */
  public function getClient() {
    $config = $this->configFactory->get('spreadsheets.spreadsheetscredentials');
    $fid = $config->get('credentials_file')[0];
    $file = $this->entityTypeManager->getStorage('file')->load($fid);
    $credentials_path = $this->fileSystem->realpath('private://' . $file->getFilename());
    $client = new \Google_Client();
    $client->setApplicationName('Google Sheets API PHP Quickstart');
    $client->setScopes([
      \Google_Service_Drive::DRIVE,
      \Google_Service_Sheets::SPREADSHEETS,
    ]);
    $client->setAuthConfig($credentials_path);
    $client->setAccessType('offline');
    $client->setApprovalPrompt('force');
    return $client;
  }

  /**
   * Get the API client and construct the service object.
   *
   * @return array
   *   an array with the sheet data
   */
  public function getdata($format = 'FORMATTED_VALUE') {
    $client = $this->client;
    $service = new \Google_Service_Sheets($client);
    $spreadsheetId = $this->sheetId;
    $name = $this->sheetName;
    $range = $this->range;
    if (empty($this->sheetId)) {
      $this->messenger->addMessage($this->t('Sheet ID is required'), 'error');
      return [];
    }
    if (empty($this->sheetName)) {
      $this->messenger->addMessage($this->t('Sheet Name is required'), 'error');
      return [];
    }
    try {
      $sheetInfo = $service->spreadsheets->get($spreadsheetId);
      $allsheet_info = $sheetInfo['sheets'];
      $idCats = array_column($allsheet_info, 'properties');
      if (!$this->myArrayContainsWord($idCats, $name)) {
        $this->messengerr->addMessage($this->t('Sheet not found'), 'error');
        return [];
      }
      $options = [
        'valueRenderOption' => $format,
      ];
      $range_format = !empty($range) ? $this->sheetName . '!' . $range : $this->sheetName;
      $response = $service->spreadsheets_values->get($spreadsheetId, $range_format, $options);
      if (!empty($response->values)) {
        return $response->values;
      }
    }
    catch (Exception $e) {
      $message = json_decode($e->getMessage(), TRUE);
      $this->messenger->addMessage($message['error']['message'], 'error');
      return [];
    }
    $this->messenger->addMessage($this->t('An error ocurred!'), 'error');
    return [];
  }

  /**
   * Set the sheet id.
   *
   * @param string $id
   *   The google sheet id.
   */
  public function setSheetId(string $id) {
    $this->sheetId = $id;
  }

  /**
   * Set the string range.
   *
   * @param string $range
   *   range (format ex A1:B2)
   */
  public function setRange(string $range) {
    $this->range = $range;
  }

  /**
   * Set the sheet name.
   *
   * @param string $name
   *   The name of the shee (ex:Sheet1)
   */
  public function setSheetName(string $name) {
    $this->sheetName = $name;
  }

  /**
   * Transforms the data to a JSON string.
   *
   * @param array $data
   *   The data of the sheet.
   */
  public function toJson(array $data) {
    $rows = [];
    $maxColumns = max(array_map(function ($row) {
      return count($row);

    }, $data));
    foreach ($data as $key => $row) {
      for ($i = 0; $i < $maxColumns; $i++) {
        $rows[$key][$i] = (!empty($row[$i])) ? $row[$i] : '';
      }
    }
    return json_encode($rows, JSON_PRETTY_PRINT);
  }

  /**
   * Transforms the sheet data into a render array.
   *
   * @param array $data
   *   The data of the sheet.
   * @param bool $setheader
   *   Sets the 1st line as the table header.
   */
  public function render(array $data, bool $setheader = TRUE) {
    $header = [];
    $rows = [];
    $maxColumns = max(array_map(function ($row) {
      return count($row);

    }, $data));
    if ($setheader) {
      for ($i = 0; $i < $maxColumns; $i++) {
        $header[$i] = (!empty($data[0][$i])) ? $data[0][$i] : '';
      }
      unset($data[0]);
    }
    foreach ($data as $key => $row) {
      for ($i = 0; $i < $maxColumns; $i++) {
        $rows[$key][$i] = (!empty($row[$i])) ? $row[$i] : '';
      }
    }
    return [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $rows,
    ];
  }

  /**
   * Checks if myArray contains a word as key.
   *
   * @param array $myArray
   *   The array to check.
   * @param mixed $word
   *   The word to find.
   *
   * @return bool
   *   True if the word is found false otherwise
   */
  public function myArrayContainsWord(array $myArray, $word) {
    foreach ($myArray as $element) {
      if ($element->title == $word) {
        return TRUE;
      }
    }
    return FALSE;
  }

  /**
   * Gets the spreadsheet sheets.
   *
   * @return array
   *   The sheets in the spreadsheet.
   */
  public function getSheets() {
    $client = $this->client;
    $service = new \Google_Service_Sheets($client);
    $sheets = $service->spreadsheets->get($this->sheetId)->sheets;

    $sheets_array = [];
    foreach ($sheets as $sheet) {
      $id = $sheet->properties['sheetId'];
      $name = $sheet->properties['title'];
      $sheets_array[$id] = $name;
    }

    return $sheets_array;
  }

  /**
   * Creates a new Spreadsheet.
   *
   * @param string $title
   *   The name of the spreadsheet.
   * @param mixed $email
   *   The email to add the write permission.
   *
   * @return mixed
   *   The spreadsheetId of the new Spreadsheet.
   */
  public function createFileInGoogleDrive($title, $email) {
    $client = $this->client;
    $service = new \Google_Service_Sheets($client);
    $spreadsheet = new \Google_Service_Sheets_Spreadsheet([
      'properties' => [
        'title' => $title,
      ],
    ]);
    $spreadsheet = $service->spreadsheets->create($spreadsheet, [
      'fields' => 'spreadsheetId',
    ]);

    $permission = [
      'type' => 'user',
      'role' => 'writer',
      'emailAddress' => $email,
    ];
    $this->addFilePermision($spreadsheet->spreadsheetId, $permission);

    return $spreadsheet->spreadsheetId;
  }

  /**
   * Adds a write permission to the Spreadsheet.
   *
   * @param mixed $fileId
   *   The spreadsheetId of the spreadsheet.
   * @param array $permission
   *   The permission array.
   */
  public function addFilePermision($fileId, array $permission) {
    $client = $this->client;
    $service = new \Google_Service_Drive($client);
    $options = [
      'sendNotificationEmail' => TRUE,
    ];
    $userPermission = new \Google_Service_Drive_Permission($permission);
    $service->permissions->create($fileId, $userPermission, $options);
  }

  /**
   * Creates a sheet in a SpreadSheet.
   *
   * @param mixed $fileId
   *   The spreadsheetId of the spreadsheet.
   * @param string $title
   *   The name of the sheet.
   */
  public function createSheetInSpreadSheet($fileId, $title) {
    $client = $this->client;
    $service = new \Google_Service_Sheets($client);
    $body = new \Google_Service_Sheets_BatchUpdateSpreadsheetRequest([
      'requests' => [
        'addSheet' => [
          'properties' => [
            'title' => $title,
          ],
        ],
      ],
    ]);
    $service->spreadsheets->batchUpdate($fileId, $body);
  }

  /**
   * Delete sheet In SpreadSheet.
   *
   * @param mixed $fileId
   *   The spreadsheetId of the spreadsheet.
   * @param string $title
   *   The name of the sheet.
   */
  public function deleteSheetInSpreadSheet($fileId, $title) {
    $client = $this->client;
    $service = new \Google_Service_Sheets($client);
    $body = new \Google_Service_Sheets_BatchUpdateSpreadsheetRequest([
      'requests' => [
        'deleteSheet' => [
          'sheetId' => $title,
        ],
      ],
    ]);
    $service->spreadsheets->batchUpdate($fileId, $body);
  }

  /**
   * Append rows to a sheet.
   *
   * @param mixed $fileId
   *   The spreadsheetId of the spreadsheet.
   * @param string $title
   *   The name of the sheet.
   * @param array $rows
   *   The rows to add.
   */
  public function appendRows($fileId, $title, array $rows) {
    $client = $this->client;
    $service = new \Google_Service_Sheets($client);
    $this->setSheetName($title);
    $valueRange = new \Google_Service_Sheets_ValueRange();
    $valueRange->setValues($rows);
    $range = $title;
    $options = ['valueInputOption' => 'USER_ENTERED'];
    $service->spreadsheets_values->append($fileId, $range, $valueRange, $options);
  }

}
