<? $this->load->view('demobuyer/topmenu'); ?>
<div class="container-fluid">
    <div class="row">
    <? $this->load->view('demobuyer/menu'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3 class="page-header">Order List</h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>Delivery Request Date</th>
                        <th>Products Count</th>
                        <th>Delivery Address</th>
                        <th>Order Total Price</th>
                        <th>Order Email</th>
                        </tr>
                    </thead>
                    <tbody>
<?
foreach($orderlist as $k => $v) {
?>
                    <tr>
                        <td><?=$v[0]?></td>
                        <td><?=$v[1]?></td>
                        <td><button type="button" class="btn btn-default btn-sm" data-toggle="collapse" data-target="#detailorder<?=$k?>" aria-expanded="false" aria-controls="detailorder<?=$k?>">Detail Order..</button>
                        <td><?=$v[3]?></td>
                        <td>RP. <?=number_format($v[5])?></td>
                        <td><?=$v[4]?></td>
                    </tr>
                    <tr class="collapse" id="detailorder<?=$k?>">
                        <td colspan="8">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Progress</th>
                                    <th>Approval Date</th>
                                    <th>Delivery Date</th>
                                    <th>Image</th>
                                    <th>Code/Name</th>
                                    <th>Company</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
<?
    foreach($v[2] as $kk => $vv) {
?>
                                <tr>
                                    <td><?=$vv[9]?></td>
                                    <td><?=$vv[11]?></td>
                                    <td><?=$vv[10]?></td>
                                    <td><img src="<?=$vv[0]?>"></td>
                                    <td><?=$vv[1]?> / <?=$vv[2]?><br>Size <?=$vv[3]?></td>
                                    <td><?=$vv[4]?></td>
                                    <td><?=$vv[5]?></td>
                                    <td>RP. <?=number_format($vv[6])?></td>
                                    <td><?=$vv[7]?>
<?
        if($vv[9] == 'Ready') {
?>
<br><input type="text" size="2" maxlength="2" id="comp<?=$kk?>" value="0">
<br><button type="button" class="btn btn-primary btn-sm complete" id="complete<?=$k?>" data-group='{"comp":"comp<?=$kk?>"}'>Complete</button>
<?
        }
?></td>
                                    <td>RP. <?=number_format($vv[8])?></td>
                                </tr>
<?
    }
?>
                            </table>
                        </td>
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
$(function() {
    $(".complete").each(function() {
        $(this).click(function() {
            if($("#"+$(this).data('group').comp).val() == 0) {
                alert('Check Delivery Conut');
                return false;
            }
            if(confirm('Complete?')) {
                alert('Complete');
            }
            return false;
        });
    });
});
</script>
