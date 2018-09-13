<?php

/**
 * Created by PhpStorm.
 * User: Don
 * Date: 10/04/2017
 * Time: 19:23
 */
class Photo extends Db_object {

    protected static $db_table = "pictures";
    protected static $db_table_fields = array('Caption', 'UserID', 'Filename', 'Alternate-text', 'Type', 'Size');
    public $u_ID;
    public $Caption;
    public $UserID = 1;
    public $Filename;
    public $Alternate_text;
    public $Type;
    public $Size;

    public $tmp_path;
    public $upload_dir = "images";
    public $errors = array();
    public $upload_errors_array = array(

        UPLOAD_ERR_OK 		  =>"There is no error.",
        UPLOAD_ERR_INI_SIZE   =>"The uploaded file exceeds the upload_max_filesize directive in php.ini.",
        UPLOAD_ERR_FORM_SIZE  =>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTTP folder.",
        UPLOAD_ERR_PARTIAL    =>"The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE    =>"No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR =>"Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE =>"Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION  =>"A PHP extension stopped the upload."

    );

    //This is passing $_FILES['uploaded_file'] as an argument

    public function set_file($file){

        // || means or
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif ($file['error'] !=0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
        } else {

            $this->Filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->Type = $file['type'];
            $this->Size = $file['size'];

        }

    } //end of set_file


    public function save(){

        if ($this->u_ID) {

            $this->update();

        } else {

            if (!empty($this->errors)) {

                return false;

            }

            if (empty($this->Filename) || empty($this->tmp_path)) {
                $this->errors[] = "The file was not available.";
                return false;
            }

            $target_path = SITE_ROOT . DS . $this->upload_dir . DS . $this->Filename;

            if (file_exists($target_path)) {
                $this->errors[] = "The file {$this->Filename} already exists.";
                return false;
            }

            if (move_uploaded_file($this->tmp_path, $target_path)) {

                if ($this->create()) {
                    unset($this->tmp_path);
                    return true;
                }

            } else {

                $this->errors[] = "The file directory probably does not have permission";
                return false;

            }

        }

    } //end of save


} //end of class