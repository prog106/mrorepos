<?php
/**
 * @ description : debug util
 * @ author : Sookwon Lee <prog106@inkomaro.com>
 */
if(!function_exists('debug_log')) {
    function debug_log($var="no data")
    {
        ob_start();
        print_r($var);
        $str = ob_get_clean();
        $str = "\n".$str."\n";
        $path = '/home/prog106/logs/log';

        if($path) {
            $fp = fopen($path, 'a');
            fputs($fp, $str);
            fclose($fp);
        }
    }
}
if(!function_exists('debug')) {
    function debug($var="no data", $die=false) {
        echo "<div style='border:1px solid #FFCC00;padding:5px'><pre>";
        print_r($var);
        echo "</pre></div>";
        if($die) die;
    }
}
if(!function_exists('debug_time')) {
    function debug_time($before=null) {
        $return = round(array_sum(explode(' ', microtime())), 3);
        if(empty($before)) {
            debug($return);
            return $return;
        }
        $return = $return - $before;
        debug($return);
        return $return;
    }
}
if(!function_exists('debug_size')) {
    function debug_size($var) {
        $len = 0;
        foreach($var as $v) {
            if(is_array($v)) {
                $len += debug_size($v);
            } else if(is_string($v)) {
                $len += strlen($v);
            } else if(is_int($v)) {
                $len += PHP_INT_SIZE;
            }
        }
        return $len;
    }
}
?>
