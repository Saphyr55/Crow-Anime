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
            var_dump($value);
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

}