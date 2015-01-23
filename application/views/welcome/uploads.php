<h1>Demo [ <?=$ec?> ]</h1>
리스트1
<table border="1">
<?
if(empty($list2)) {
    echo "<tr><td colspan=\"4\">No Data</td></tr>";
}
foreach($list1 as $k => $v) {
    echo "<tr><td>".$v['id']."</td><td>".$v['comments']."</td><td>".$v['photo']."</td><td>".$v['regdate']."</td></tr>";
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
<p>
이미지업로드
<form>
    <input type="hidden" name="upimg1_tmp" id="upimg1_tmp" value="">
    <input id="upimg1" type="file" multiple="true">
    <div id="tmpPreview_upimg1" class="tmpPreviewBox" style="display:none"></div>
</form>

<script type="text/javascript">
$(function() {
    $('input:file').each(function(){
        var mid = $(this).attr('id');
        var msrl = mid.split('imageupload')[1];
        $('#'+mid).uploadify({
            //'buttonImage':'/static/img/uploadify-cancel.png',
            'width':45,
            'height':18,
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
