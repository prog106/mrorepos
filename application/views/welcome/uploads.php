<h1>Demo [ <?=$ec?> ]</h1>
데이터 추가 등록
<form id="mro_form" name="mro_form" method="post" enctype="multipart/form-data">
<input type="hidden" name="upimg1_tmp" id="upimg1_tmp" value="">
comments : <input type="text" id="comments" name="comments">
<br>
photo : <input id="upimg1" type="file" multiple="true">
<div id="tmpPreview_upimg1" class="tmpPreviewBox" style="display:none"></div>
<br>
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
<table border="1">
    <tr>
        <td><?=$one['id']?></td>
        <td><?=$one['comments']?></td>
        <td><?=$one['photo']?></td>
        <td><?=$one['regdate']?></td>
    </tr>
</table>
<script type="text/javascript">
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
                'uploader':'/index.php/uploads/doimage',
                'onUploadSuccess':function(obj,data) {
                    var r = $.parseJSON(data);
                    if(r.ret = 'OK') {
                        PreviewtmpImage(mid,r.msg);
                    } else {
                        alert(r.msg);
                    }
                },
            });
        });
    }, 0);
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
            url:'/index.php/welcome/exadd',
            type:"post",
            data:$("#mro_form").serialize(),
            success:function(d) {
                var v=$.parseJSON(d);
                console.log(v);
                if(v.ret == 'OK') {
                    alert('정상 등록');
                    self.location.reload();
                } else {
                    alert('등록 실패');
                }
            },
            error:function(d) {
                alert('처리중 오류가 발생하였습니다. 다시 시도해 주세요');
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
    if(confirm('Realy?')) {
        $('#'+mid+'_tmp').val('');
        $('#tmpPreview_'+mid).html('').hide();
    }
}
</script>
