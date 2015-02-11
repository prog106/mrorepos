<div class="container" style="margin-top:10%;">
    <div class="row pull-bottom">
        <div class="col-sm-4">
            <img src="/static/img/logo_color2.png" class="img-responsive">
        </div>
        <div class="col-sm-4">
            <h2>Welcome to Inkomaro</h2>
            <h2>e-procurement system</h2>
            <h4>It will show you ordering process and delivery receipt process</h4>
        </div>
        <div class="col-sm-4">
            <form class="form-signin" id="loginform" method="post">
                <div class="form-group">
                    <h2 class="form-signin-heading">Please Login</h2>
                </div>
                <div class="form-group">
                    <label for="inputId" class="control-label">Login ID</label>
                    <input type="text" id="inputId" class="form-control" placeholder="Login ID" required autofocus>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="control-label">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <a href="#">For get your password?</a>
                </div>
                <button class="btn btn-primary pull-right" style="width:100px;" type="submit">Login</button>
            </form>
        </div>
    </div>
</div> <!-- /container -->
<div class="jumbotron" style="margin-top:50px;background-color:#6F2499;"></div>
<script>
$(function() {
    $('#loginform').submit(function() {
        if(!$('#inputId').val()) {
            alert('Login id, please');
            return false;
        }
        if(!$('#inputPassword').val()) {
            alert('Login password, please');
            return false;
        }
        $("#loginform").attr("action", "/demobuyer/index");
        $("#loginform").submit();
        return false;
    });
});
</script>
