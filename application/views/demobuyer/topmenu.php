<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
<?
foreach($topmenu as $k => $v) {
?>
                <li><a href="/<?=$v?>"><?=$k?></a></li>
<?
}
?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div id="navbar" class="navbar-collapse collapse">
            <div style="position:absolute;left:20%;line-height:50px;" id="catectrl">
                <ul class="nav navbar">
                    <li class="dropdown"><button class="dropdown-toggle btn btn-default" data-toggle="dropdown">Categories <b class="caret"></b></button>
                        <ul class="dropdown-menu">
<?
foreach($categories as $k => $v) {
?>
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$k?></a>
                                <ul class="dropdown-menu">
<?
    foreach($v as $kk => $vv) {
?>
                                    <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$kk?></a>
                                        <ul class="dropdown-menu">
<?
        foreach($vv as $kkk => $vvv) {
?>
                                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$kkk?></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="/demobuyer/search">All <?=$kkk?></a></li>
                                                    <li role="presentation" class="divider"></li>
<?
            foreach($vvv as $kkkk => $vvvv) {
?>
                                                    <li><a href="/demobuyer/search"><?=$vvvv?></a></li>
<?
            }
?>
                                                </ul>
                                            </li>
<?
        }
?>
                                        </ul>
                                    </li>
<?
    }
?>
                                </ul>
                            </li>
<?
}
?>
                        </ul>
                    </li>
                </ul>
            </div>
            <form class="navbar-form navbar-right form-inline" id="search" method="post">
                <!-- div class="form-group">
                <select class="form-control">
                    <option>code</option>
                    <option>product</option>
                    <option>company</option>
                </select>
                </div -->
                <div class="form-group" style="width:300px;">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                        <input type="text" class="form-control" placeholder="Bearing" id="keyword" size="20">
                    </div>
                </div>
                <div class="form-group">
                <input type="submit" class="form-control" value="Searching">
                </div>
            </form>
        </div>
    </div>
</nav>
<script>
$(function() {
    $('#search').submit(function() {
        if(!$('#keyword').val()) {
            alert('Keyword, please');
            return false;
        }
        $("#search").attr("action", "/demobuyer/search");
        $("#search").submit();
        return false;
    });
    $('#catectrl').click(function() {
        $('#cate').toggle();
    });
    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
        event.preventDefault(); 
        event.stopPropagation(); 
        $(this).parent().siblings().removeClass('open');
        $(this).parent().toggleClass('open');
    });
});
</script>
