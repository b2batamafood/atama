<?php

namespace App;

class QbLogger {
    function _log($mess = ''): void {
        $file_name = './log/clients.log';
        if(!file_exists(dirname($file_name)))
            mkdir(dirname($file_name), 0777);

        $f = fopen($file_name, "ab");
        fwrite($f, "==============================================\n");
        fwrite($f, "[" . date("m/d/Y H:i:s") . "] ".$mess."\n");
        fclose($f);
    }
}
