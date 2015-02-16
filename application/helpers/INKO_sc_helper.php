<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @ description : status code list & etc...
 * @ author : Sookwon Lee <prog106@inkomaro.com>
 */
if(!function_exists('alertmsg')) {
    function alertmsg($msg) {
        echo "
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
</head>
<body>
<script> alert('".$msg."'); </script>
</body>
</html>";
    }
}

if(!function_exists('lang')) {
    function lang($en) {
        $local = (!empty($_COOKIE['languages'])) ? $_COOKIE['languages'] : 'english' ;
        if($local == 'english') {
            return $en;
        }
        $en = strtolower($en);
        $res['korea'] = array(
            'error' => '오류',
            'products' => '상품',
            'demo' => '데모',
            'signin' => '회원가입',
            'id' => '아이디',
            'password' => '비밀번호',
            'login' => '로그인',
            'comments' => '상세설명',
            'image' => '이미지',
            'photo' => '사진',
            'wrong connect' => '잘못된 접근입니다.',
            'welcome mro' => '어서오세요',
            'no match' => '일치하는 정보 없음',
            'success' => '성공',
        );
        if(empty(array_key_exists($en, $res[$local]))) {
            return $en;
        } else {
            return $res[$local][$en];
        }
    }
}
