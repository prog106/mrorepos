<?php
class Errcode {
    function code($code='E999') {
        $ret['E000'] = '정상적인 접근이 아닙니다.';
        $ret['E201'] = '필수 파라미터가 없습니다.';
        $ret['E999'] = 'No Error Code';
        if(empty(array_key_exists($code, $ret))) {
            return array('E999' => $ret['E999']);
        } 
        $return[$code] = $ret[$code];
        return $return;
    }
    function axcode($code='X999') {
        $ret['X000'] = '정상적인 접근이 아닙니다.';
        $ret['X201'] = '필수 파라미터가 없습니다.';
        $ret['X999'] = 'No Error Code';
        if(empty(array_key_exists($code, $ret))) {
            return json_encode(array('X999' => $ret['X999']));
        } 
        $return[$code] = $ret[$code];
        return json_encode($return);
    }
}
?>
