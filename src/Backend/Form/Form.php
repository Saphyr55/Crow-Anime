<?php

namespace CrowAnime\Backend\Form;

use CrowAnime\Backend\Database\DBExepction;

abstract class Form {

    private array $data;

    public function __construct(array $data = []) {
        $this->data = $data;
    }
    
    public static function check(array $data) : bool
    {   
        $i = 0;
        foreach ($data as $key => $value) {
            if (isset($value) ) {
                if (is_string($value) ) {
                    if( empty($value) || strlen(trim($value)) == 0 )
                        return false;
                }
                $i++;
            }
        }
        return ($i === count($data) && $i !== 0) ? true : false;
    }

    public function getData() : array
    {
        return $this->data;
    }

    public function setData(array $data) : self
    {
        $this->data = $data;

        return $this;
    }

    public static function upload_file(string $name_file, array $allowed, string $uploadfile)
    {
        foreach ($allowed as $value) {
            if ($_FILES[$name_file]['type'] === $value) {
                move_uploaded_file($_FILES[$name_file]["tmp_name"], $uploadfile);
                break;
            }
        }
    }

}