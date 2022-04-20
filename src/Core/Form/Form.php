<?php

namespace CrowAnime\Core\Form;

abstract class Form {

    protected array $data;

    public function __construct(array $data = []) {
        $this->data = $data;
    }
    
    public static function check(array $data) : bool
    {   
        $i = 0;
        foreach ($data as $key => $value) {
            if (strcmp($key, 'manga_volumes')!==0) {
                if (isset($value) ) {
                    if (is_string($value) ) {
                        if( empty($value) || strlen(trim($value)) == 0 )
                            return false;
                    }
                }
            }
            $i++;
        }
        return $i === count($data) && $i !== 0;
    }

// --Commented out by Inspection START (20/04/2022 16:18):
//    public function getData() : array
//    {
//        return $this->data;
//    }
// --Commented out by Inspection STOP (20/04/2022 16:18)


// --Commented out by Inspection START (20/04/2022 16:18):
//    public function setData(array $data) : self
//    {
//        $this->data = $data;
//
//        return $this;
//    }
// --Commented out by Inspection STOP (20/04/2022 16:18)


    public static function upload_file(string $name_file, array $allowed, string $uploadfile): void
    {
        foreach ($allowed as $value) {
            if ($_FILES[$name_file]['type'] === $value) {
                move_uploaded_file($_FILES[$name_file]["tmp_name"], $uploadfile);
                break;
            }
        }
    }

}