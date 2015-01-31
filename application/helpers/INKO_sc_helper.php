<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @ description : status code list & etc...
 * @ author : Sookwon Lee <prog106@inkomaro.com>
 */
if ( ! function_exists('alertmsg'))
{

    function alertmsg($prm) {
        echo "
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
</head>
<body>
<script> alert('".$prm['msg']."'); </script>
</body>
</html>";
    }

}

if ( ! function_exists('sc'))
{
	function sc($code='E999', $view=null)
	{
        $res['korea'] = array(
            'S100' => '정상적으로 등록되었습니다.',
            'S900' => '회원가입이 완료 되었습니다.',
            'E000' => '정상적인 접근이 아닙니다.',
            'E100' => '등록에 실패하였습니다.',
            'E201' => '필수 파라미터가 없습니다.',
            'E900' => '아이디 or 비밀번호가 일치하지 않습니다.',
            'E910' => '회원가입에 실패하였습니다.',
            'E920' => '로그아웃에 실패하였습니다.',
            'E930' => '로그인에 실패하였습니다.',
            'E999' => '일치하는 에러코드가 없습니다.',
        );
        // english
        $res['english'] = array(
            'V000' => 'Welcome MRO',
            'T110' => 'Login ID Check Please! (number, a to z, 4~20byte)',
            'T120' => 'Login Password Check Please! (number, a to z, 4~20byte)',
            'C900' => 'Do you want Delete, Realy?',
            'S100' => '정상적으로 등록되었습니다.',
            'S900' => '회원가입이 완료 되었습니다.',
            'E000' => '정상적인 접근이 아닙니다.',
            'E100' => '등록에 실패하였습니다.',
            'E201' => '필수 파라미터가 없습니다.',
            'E900' => '아이디 or 비밀번호가 일치하지 않습니다.',
            'E910' => '회원가입에 실패하였습니다.',
            'E920' => '로그아웃에 실패하였습니다.',
            'E930' => '로그인에 실패하였습니다.',
            'E998' => '처리중 오류가 발생하였습니다. 다시 시도해 주세요.',
            'E999' => 'No Error Code',
        );
        $ret = $res[LANGS];
        $code = (empty($ret[$code])) ? 'E999' : $code;
        if($view == 'msg') {
            return $ret[$code];
        }
        return array('ret' => $code, 'msg' => $ret[$code]);
    }
}
