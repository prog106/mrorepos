<? $this->load->view('demobuyer/topmenu'); ?>
<div class="container-fluid">
    <div class="row">
    <? $this->load->view('demobuyer/menu'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3 class="page-header">Order List</h3>
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
                        </tr>
                    </thead>
                    <tbody>
<?
foreach($order as $k => $v) {
?>
                    <tr>
                        <td><img src="<?=$v[0]?>"></td>
                        <td><?=$v[1]?> / <?=$v[2]?><br>Size <?=$v[3]?></td>
                        <td><?=$v[4]?></td>
                        <td><?=$v[5]?></td>
                        <td>RP. <?=number_format($v[6])?></td>
                        <td><?=$v[7]?></td>
                        <td>RP. <?=number_format($v[8])?></td>
                    </tr>
<?
}
?>
                    <tr>
                        <td colspan="4"></td>
                        <td colspan="2">Order Total Price</td>
                        <td>RP. 10,000,000</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="deliverydate" class="col-sm-3 control-label">Delivery Date</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="deliverydate" placeholder="Delivery Date" style="width:200px;" value="2015-02-10" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deliveryaddr" class="col-sm-3 control-label">Delivery Address</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="deliveryaddr" placeholder="Delivery Address" value="515, sealul Bldg, 18 Teheran-ro33-gil, Gangnam-gu, Seoul, Korea" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" placeholder="Email" value="admin@inkomaro.com" disabled>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
Number.prototype.format = function(){
    if(this==0) return 0;
    var reg = /(^[+-]?\d+)(\d{3})/;
    var n = (this + '');
    while (reg.test(n)) n = n.replace(reg, '$1' + ',' + '$2');
        </div>
    </div>
</div>
