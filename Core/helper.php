<?php

if (! function_exists('env')){
    /**
     * Return the variable of environnement.
     * @param $key
     */
    function env($key){
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/.env')) {
            foreach (file($_SERVER['DOCUMENT_ROOT'] . '/.env') as $line) {
                if (preg_match("/$key/", $line)) {
                    return str_replace($key . '=', '', $line);
                }
            }
        }

        return false;
    }
}