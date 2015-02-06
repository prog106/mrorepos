            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li><img src="/static/img/logo_white1.png" style="width:100%;padding:10px 30px;"></li>
                    <li><img src="/static/img/andry.png" style="width:100%;padding:10px 60px;"></li>
                    <li style="text-align:center"><span style="color:white;">Andry Suhaili</span></li>
                    <li style="text-align:center;padding-bottom:10px;"><button type="button" style="margin-top:10px;" class="btn btn-default btn-xs">logout</button></li>
                    <li<?=($tmp=='mro/index')? ' class="active"':'';?>><a href="/welcome/mro">Main</a></li>
                    <li<?=($tmp=='mro/search')? ' class="active"':'';?>><a href="/welcome/search">Search</a></li>
                    <li<?=($tmp=='mro/cart')? ' class="active"':'';?>><a href="/welcome/cart">Cart</a></li>
                    <li<?=($tmp=='mro/orderlist')? ' class="active"':'';?>><a href="/welcome/orderlist">Order List</a></li>
                    <li<?=($tmp=='mro/order')? ' class="active"':'';?>><a href="/welcome/order">Order</a></li>
                </ul>
            </div>
