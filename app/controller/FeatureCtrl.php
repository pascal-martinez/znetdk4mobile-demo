<?php
namespace app\controller;

class FeatureCtrl extends \AppController {

    static protected function action_loader() {
        $response = new \Response();
        sleep(5);
        $response->success = TRUE;
        return $response;
    }
    
    static protected function action_ajaxsuccess() {
        $response = new \Response();
        sleep(1);
        $response->success = TRUE;
        return $response;
    }
    
    static protected function action_ajaxfail() {
        $response = new \Response();
        sleep(1);
        $response->setCriticalMessage('Critical Error', new \Exception('Text of the exception', '99'));
        return $response;
    }
    
    static protected function action_formsubmit() {        
        $response = new \Response();
        $validator = new \app\validator\FormValidator();
        $validator->setCheckingMissingValues();
        if (!$validator->validate()) {
            $response->setFailedMessage(NULL, $validator->getErrorMessage(),
                    $validator->getErrorVariable());
            return $response;
        }
        $response->setSuccessMessage(NULL, 'Validation succeeded.');
        return $response;
    }
    
    static protected function action_upload() {
        $response = new \Response();        
        if (!is_array($_FILES['files'])
                || !is_array($_FILES['files']['name'])
                || count($_FILES['files']['name']) ===0 
                || $_FILES['files']['name'][0] === '') {
            $response->setFailedMessage(NULL, 'Please, select a file.');
            return $response;
        }
        $request = new \Request();
        $fileCount = count($_FILES['files']['name']);
        $fileTag = $request->file_tag === NULL ? '<i>no tag</i>' : "<b>{$request->file_tag}</b>";
        $filenames = implode(', ', $_FILES['files']['name']);
        $response->setSuccessMessage('Upload', "Count of uploaded files: <b>$fileCount</b><br>"
            . "Uploaded files: <i>$filenames</i><br>"
            . "Choosen files tag : $fileTag<br>");
        return $response;
    }
    
    static protected function action_download() {
        $request = new \Request();
        $allowedFiles = array('document.pdf', 'picture.jpg');
        $response = new \Response();
        if (!in_array($request->filename, $allowedFiles)) {
            $response->doHttpError(404, 'Download', 'The specified file is unknown!');
            return $response;
        }
        $filePath = CFG_DOCUMENTS_DIR . DIRECTORY_SEPARATOR . $request->filename;
        if (!file_exists($filePath)) {
            $response->doHttpError(404, 'Download', 'The specified file is missing!');
        }
        $inline = $request->inline === NULL ? TRUE : $request->inline === 'true';
        $response->setFileToDownload($filePath, $inline, $request->filename);
        return $response;
    }
    
}