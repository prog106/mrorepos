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
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right" id="search" method="post">
                <input type="text" class="form-control" placeholder="Bearing" id="keyword">
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
        $("#search").attr("action", "/welcome/search");
        $("#search").submit();
        return false;
    });
});
</script>
