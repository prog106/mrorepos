        <!-- top bar -->
        <div id="navbar" class="navbar-collapse collapse navbar-fixed-top topbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
        <!-- side bar -->
        <div class="col-sm-3 col-md-2 sidebar">
            <div style="text-align:center;margin-bottom:15px;">
                <img src="/static/img/logo_white1.png" class="sidebarimg">
                <img src="/static/img/andry.png" style="width:100px;margin-bottom:10px" class="img-thumbnail sidebarimg"><br>
                <span style="color:white">Andry Suhaili</span><br>
                <button type="button" style="margin-top:10px;" class="btn btn-default btn-xs">logout</button>
            </div>
            <ul class="nav nav-sidebar">
                <li<?=($tmp=='mro/index')? ' class="active"':'';?>><a href="/welcome/mro">Main</a></li>
                <li<?=($tmp=='mro/search')? ' class="active"':'';?>><a href="/welcome/search">Search</a></li>
                <li<?=($tmp=='mro/cart')? ' class="active"':'';?>><a href="/welcome/cart">Cart</a></li>
                <li<?=($tmp=='mro/orderlist')? ' class="active"':'';?>><a href="/welcome/orderlist">Order List</a></li>
                <li<?=($tmp=='mro/order')? ' class="active"':'';?>><a href="/welcome/order">Order</a></li>
            </ul>
        </div>
        <!-- contents -->
