<?php

namespace Library;

class Config
{
    public function __construct()
    {
        // todo: for all xml files in conf dir - private function(file)
//        $xmlFiles = scandir(CONFIG_DIR);

            $file = CONFIG_DIR . 'db.xml';
//        $mask = '~/^(.*\.(?!(xml)$))?[^.]*$/i~';

//        foreach ($xmlFiles as $file){

            $xmlObject = simplexml_load_file($file, 'SimpleXMLElement', LIBXML_NOWARNING);

            if (!$xmlObject) {
                throw new \Exception('Config file not found');
            }

            foreach ($xmlObject as  $key => $value) {
                $this->$key = (string)$value;
            }
//        }


    }

    public function __get($name)
    {
        throw new \Exception('Param not found');
    }
}
