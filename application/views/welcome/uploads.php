<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UploadiFive Test</title>
<script src="/static/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/static/js/jquery.uploadify.min.js" type="text/javascript"></script>
<style type="text/css">
body {
    font: 13px Arial, Helvetica, Sans-serif;
}
</style>
</head>

<body>
    <h1>Uploadify Demo</h1>
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
                'buttonText':'SELECT IMAGE',
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
</body>
</html>
