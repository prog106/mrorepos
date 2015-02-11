<? $this->load->view('demobuyer/topmenu'); ?>
<div class="container-fluid">
    <div class="row">
    <? $this->load->view('demobuyer/menu'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3 class="page-header">Approval List</h3>
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
foreach($approvallist as $k => $v) {
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
                                    <th>Approval check</th>
                                    <th>Progress</th>
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
                                    <td><div class="checkbox"><label><input type="checkbox" id="chkappr<?=$k?><?=$kk?>" class="chkappr">check</label></div></td>
                                    <td><?=$vv[9]?></td>
                                    <td><img src="<?=$vv[0]?>"></td>
                                    <td><?=$vv[1]?> / <?=$vv[2]?><br>Size <?=$vv[3]?></td>
                                    <td><?=$vv[4]?></td>
                                    <td><?=$vv[5]?></td>
                                    <td>RP. <?=number_format($vv[6])?><input type="hidden" id="prc<?=$k?><?=$kk?>" value="<?=$vv[6]?>"</td>
                                    <td><input id="ordcnt<?=$k?><?=$kk?>" type="text" size="2" maxlength="2" value="<?=$vv[7]?>" class="qv" data-group='{"prc":"prc<?=$k?><?=$kk?>","totalprc":"totalprc<?=$k?><?=$kk?>","chkappr":"chkappr<?=$k?><?=$kk?>","sprc":"sprc<?=$k?>","smprc":"smprc<?=$k?>"}'></td>
                                    <td><div id="totalprc<?=$k?><?=$kk?>"></div></td>
                                </tr>
<?
    }
?>
                                <tr>
                                    <td colspan="7"></td>
                                    <td colspan="1">Total Price</td>
                                    <td colspan="1"><div id="sprc<?=$k?>"></div><input type="hidden" id="smprc<?=$k?>" value="0"></td>
                                </tr>
                                <tr>
                                <td colspan="9"><button type="button" class="btn btn-danger" id="approval" data-group='{"smprc":"smprc<?=$k?>"}'>Approval</button></td>
                                </tr>
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
Number.prototype.format = function(){
    if(this==0) return 0;
    var reg = /(^[+-]?\d+)(\d{3})/;
    var n = (this + '');
    while (reg.test(n)) n = n.replace(reg, '$1' + ',' + '$2');
    return n;
};

function qv() {
    var tpv = 0;
    $('.qv').each(function() {
        var pv = $(this).val();
        var qv = $("#"+$(this).data('group').prc).val();
        $("#"+$(this).data('group').totalprc).html('RP. ' + (pv * qv).format());
        if($("#"+$(this).data('group').chkappr).prop('checked')) {
            tpv += parseInt(pv * qv,10);
        }
        $("#"+$(this).data('group').sprc).html('RP. ' + tpv.format());
        $("#"+$(this).data('group').smprc).val(tpv);
    });
}
qv();
$(function() {
    $('.qv').keyup(function() { qv(); });
    $('.chkappr').change(function() { qv(); });
    $('#approval').click(function() {
        if($("#"+$(this).data('group').smprc).val() == 0) {
            alert('Approval check, please');
            return false;
        }
        if(confirm('Approval?')) {
            location.href='/demobuyer/orderlist';
        }
        return false;
    });
    $('#deliverydate').datepicker({ format: 'yyyy-mm-dd', startDate: '+1d' });
});
</script>
