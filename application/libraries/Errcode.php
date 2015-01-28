<?php
class Errcode {
    function code($code='E999') {
        $ret['E000'] = '정상적인 접근이 아닙니다.';
        $ret['E100'] = '등록에 실패하였습니다.';
        $ret['E201'] = '필수 파라미터가 없습니다.';
        $ret['E999'] = 'No Error Code';
        if(empty(array_key_exists($code, $ret))) {
            return array('ret' => 'E999', 'msg' => $ret['E999']);
        } 
        $return['ret'] = $code;
        $return['msg'] = $ret[$code];
        return $return;
    }
}
?>
