<a href="javacript:;" onclick="langs('korea');">한글</a> | <a href="javascript:;" onclick="langs('english');">English</a>

<h1><?=lang('Demo')?> [ <?=$ec?> ]</h1>
xmlrpc test result
<?
debug($rpcret);
?>
<br>
<h3>Memcached Time(60sec) [ <?=$memcache_time?> ]</h3>
<a href="/welcome/memreset">Memcached Time Reset</a>
<br>
<a href="/welcome/memallreset">Memcached All Reset</a>
<br>

<?
if(empty($logininfo)) {
?>
<?=lang('signin')?>
<form id="signin_form" name="signin_form" method="post" enctype="multipart/form-data">
<?=lang('id')?> : <input type="text" id="signin_id" name="signin_id" maxlength="20"> 20자 이내<br>
<?=lang('password')?> : <input type="password" id="signin_pw" name="signin_pw" maxlength="20"> 20자 이내<br>
<button type="button" id="signin"><?=lang('signin')?></button>
</form>
<br>
<?=lang('login')?>
<form id="login_form" name="login_form" method="post" enctype="multipart/form-data">
<input type="hidden" name="returl" value="<? echo $_SERVER['REQUEST_URI']; ?>">
<?=lang('id')?> : <input type="text" id="login_id" name="login_id" maxlength="20"> 20자 이내<br>
<?=lang('password')?> : <input type="password" id="login_pw" name="login_pw" maxlength="20"> 20자 이내<br>
<button type="button" id="login_act"><?=lang('login')?></button>
</form>
<? } else { ?>
<? echo $logininfo; ?><br>
<form id="logout_form" name="logout_form" method="post" enctype="multipart/form-data">
<input type="hidden" name="returl" value="<? echo $_SERVER['REQUEST_URI']; ?>">
<input type="button" value="logout" id="logout">
</form>
<? } ?>
<br>


데이터 추가 등록
<form id="mro_form" name="mro_form" method="post" enctype="multipart/form-data">
<input type="hidden" name="upimg1_tmp" id="upimg1_tmp" value="">
<?=lang('comments')?> : <input type="text" id="comments" name="comments">
<br>
<?=lang('photo')?> : <input id="upimg1" type="file" multiple="true">
<div id="tmpPreview_upimg1" class="tmpPreviewBox" style="display:none"></div>
<input type="submit" value="등록">
</form>


리스트1
<table border="1">
<?
if(empty($list1)) {
    echo "<tr><td colspan=\"4\">No Data</td></tr>";
}
foreach($list1 as $k => $v) {
    echo "<tr><td>".$v['id']."</td><td>".$v['comments']."</td><td><img src=\"".$v['photo']."\"></td><td>".$v['regdate']."</td></tr>";
}
?>
</table>
<p>


리스트2
<table border="1">
<?
if(empty($list2)) {
    echo "<tr><td colspan=\"4\">No Data</td></tr>";
}
foreach($list2 as $k => $v) {
    echo "<tr><td>".$v['id']."</td><td>".$v['comments']."</td><td>".$v['photo']."</td><td>".$v['regdate']."</td></tr>";
}
?>
</table>
<p>


1개
<?
if(empty($one)) {
?>
<br>No Data
<?
} else {
?>
<table border="1">
    <tr>
        <td><?=$one['id']?></td>
        <td><?=$one['comments']?></td>
        <td><?=$one['photo']?></td>
        <td><?=$one['regdate']?></td>
    </tr>
</table>
<?
}
?>


<script type="text/javascript">
function prmchk(str) {
    return ((str.match(/[^(0-9a-z)]/)) ? false : true) ? ((str.length < 4 || str.length > 20) ? false : true) : false ;
}
function langs(lang) {
    $.ajax({
        cache:false,
        url:'/welcome/languages',
        type:"post",
        data:{ langs : lang },
        success:function(d) {
            var v=$.parseJSON(d);
            self.location.reload();
        },
        error:function(d) {
            alert('<?=lang('error')?>');
        }
    });
}
$(function() {
    setTimeout(function() {
        $('input:file').each(function(){
            var mid = $(this).attr('id');
            var msrl = mid.split('imageupload')[1];
            $('#'+mid).uploadify({
                //'buttonImage':'/static/img/uploadify-cancel.png',
                'removeCompeted':true,
                'width':100,
                'height':25,
                'buttonText':'IMAGE..',
                'fileSizeLimit':'100KB',
                'fileTypeDesc':'Image Files',
                'fileTypeExts':'*.gif; *.jpg; *.png; *.jpeg',
                'formData':{
                    'timestamp':'<?=$timestamp=time();?>',
                    'token':'<?=md5('verified'.$timestamp);?>'
                },
                'swf':'/static/js/uploadify.swf',
                'uploader':'/uploads/doimage',
                'onUploadSuccess':function(obj,data) {
                    var v=$.parseJSON(data);
                    if(v.ret = 'OK') {
                        PreviewtmpImage(mid,v.msg);
                    } else {
                        alert(v.msg);
                    }
                },
            });
        });
    }, 0);
    $("#logout").click(function() {
        $("#logout_form").attr("action", "/welcome/logout");
        $("#logout_form").submit();
        return false;
    });
    $("#signin").click(function() {
        if(!prmchk($('#signin_id').val())) {
            alert('id please 0~9, a~z, 4~20byte');
            $('#signin_id').focus();
            return false;
        }

        if(!prmchk($('#signin_pw').val())) {
            alert('password please 0~9, a~z, 4~20byte');
            $('#signin_pw').focus();
            return false;
        }

        $.ajax({
            cache:false,
            url:'/welcome/exsignin',
            type:"post",
            data:$("#signin_form").serialize(),
            success:function(d) {
                var v=$.parseJSON(d);
                alert(v.msg);
            },
            error:function(d) {
                alert('<?=lang('error')?>');
            }
        });
        return false;
    });
    $("#login_act").click(function() {
        if(!prmchk($('#login_id').val())) {
            alert('<?=lang('check login id')?>');
            $('#login_id').focus();
            return false;
        }

        if(!prmchk($('#login_pw').val())) {
            alert('<?=lang('check login password')?>');
            $('#login_pw').focus();
            return false;
        }

        $("#login_form").attr("action", "/welcome/login");
        $("#login_form").submit();
        return false;
    });
    $("#mro_form").submit(function() {
        if(!$('#comments').val()) {
            alert('comments please');
            $('#comments').focus();
            return false;
        }

        if(!$('#upimg1_tmp').val()) {
            alert('photo please');
            return false;
        }

        $.ajax({
            cache:false,
            url:'/welcome/exadd',
            type:"post",
            data:$("#mro_form").serialize(),
            success:function(d) {
                var v=$.parseJSON(d);
                if(v.ret == 'OK') {
                    alert(v.msg);
                    self.location.reload();
                } else {
                    alert(v.msg);
                }
            },
            error:function(d) {
                alert('<?=lang('error')?>');
            }
        });
        return false;
    });
});
function PreviewtmpImage(mid,msg) {
    var imginfo = '';
    if(msg) {
        $('#'+mid+'_tmp').val(msg);
        imginfo = '<img src="'+msg+'"> <input type="button" onclick="DeletetmpImage(\''+mid+'\',\''+msg+'\');" value="DELETE">';
        $('#tmpPreview_'+mid).html(imginfo).show();
    }
}
function DeletetmpImage(mid,msg) {
    if(confirm('<?=lang('no match')?>')) {
        $('#'+mid+'_tmp').val('');
        $('#tmpPreview_'+mid).html('').hide();
    }
}
</script>
