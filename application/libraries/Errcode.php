<?php
class Errcode {
    function code($code='E999') {
        $ret['E000'] = '정상적인 접근이 아닙니다.';
        $ret['E100'] = '등록에 실패하였습니다.';
        $ret['E201'] = '필수 파라미터가 없습니다.';
        $ret['E900'] = '아이디 or 비밀번호가 일치하지 않습니다.';
        $ret['E910'] = '회원가입에 실패하였습니다.';
        $ret['E920'] = '로그아웃에 실패하였습니다.';
        $ret['E930'] = '로그인에 실패하였습니다.';
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
