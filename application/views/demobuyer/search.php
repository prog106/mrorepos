<? $this->load->view('demobuyer/topmenu'); ?>
<div class="container-fluid">
    <div class="row">
    <? $this->load->view('demobuyer/menu'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <span style="color:#1e1e1e">Search Keyword : </span><span style="color:#353535">Bearing</strong></h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th class="col-sm-3">Code/Name</th>
                        <th>Company</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
<?
foreach($searchlist as $k => $v) {
?>
                    <tr>
                        <td><img src="<?=$v[0]?>"></td>
                        <td><?=$v[1]?> / <?=$v[2]?><br>Size <?=$v[3]?></td>
                        <td><?=$v[4]?></td>
                        <td><?=$v[5]?></td>
                        <td>RP. <?=number_format($v[6]);?></td>
                        <td><input type="text" size="2" maxlength="2" value="1"></td>
                        <td style="text-align:center"><span class="glyphicon glyphicon-shopping-cart"></span><br><a href="javascript:;" onclick="addcart();">Add to Cart</a><br>
                            <span class="glyphicon glyphicon-credit-card"></span><br><a href="/mro/order">Order</a></td>
                    </tr>
<?
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
function addcart() {
    if(confirm('장바구니 담았음. 장바구니로 이동?')) {
        location.href='/demobuyer/cart';
    }
}
</script>
