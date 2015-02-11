            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li><img src="/static/img/logo_white1.png" style="width:100%;padding:10px 30px;"></li>
                    <li><img src="/static/img/andry.png" style="width:100%;padding:10px 60px;"></li>
                    <li style="text-align:center"><span style="color:white;">Andry Suhaili</span></li>
                    <li style="text-align:center;padding-bottom:10px;"><button type="button" style="margin-top:10px;" class="btn btn-default btn-xs" id="idxlogout">logout</button></li>
<?
foreach($leftmenu as $k => $v) {
?>
                    <li<?=($tmp==$v)? ' class="active"':'';?>><a href="/<?=$v?>"><?=$k?></a></li>
<?
}
?>
                </ul>
            </div>
<script>
$(function() {
    $("#idxlogout").click(function() {
        if(confirm('logout?')) {
            self.location.href="/demobuyer/idxlogin";
            return false;
        }
        return false;
    });
});
</script>
