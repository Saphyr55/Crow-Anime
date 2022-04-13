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
        foreach ($data as $value) {
            if (isset($value) && !is_null($value) ){
                if (is_string($value)){
                    $t = 0;
                    for ($j=0; $j < strlen($value) ; $j++) {
                        if($value[$i] === ' ' || $value[$i] === '') $t++;
                        if ($t === strlen($value)) 
                            return false;
                    }
                }
                $i++;
            }
        }
        return ($i === count($data)) ? true : false;
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