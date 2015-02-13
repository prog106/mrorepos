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
                        <th>Order No</th>
                        <th>Product No</th>
                        <th style="width:80px">Order Date</th>
                        <th>Request Delivery Date</th>
                        <th>Delivery Date Scheduled</th>
                        <th>Product Info</th>
                        <th>Unit</th>
                        <th>Price(RP.)</th>
                        <th>Quantity</th>
                        <th>입고수량</th>
                        <th>Tatal Price(RP.)</th>
                        <th>VAT(RP.)</th>
                        <th>Total Price + VAT(RP.)</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
<?
foreach($orderlist as $k => $v) {
    $class = ($v[11] == '확정주문')?'active':(($v[11] == '출하')?'warning':(($v[11] == '입고완료')?'danger':''))
?>
                    <tr class="<?=$class?>">
                        <td><?=$v[0]?></td>
                        <td><?=$v[1]?></td>
                        <td><?=$v[2]?></td>
                        <td><?=$v[3]?></td>
                        <td><?=$v[4]?></td>
                        <td><strong><?=$v[5]?></strong><br><?=$v[6]?></td>
                        <td><?=$v[8]?></td>
                        <td><?=number_format($v[9])?></td>
                        <td><?=number_format($v[10])?></td>
                        <td id="incomerow<?=$k?>">
<?
    if($v[11] == '출하') {
?>
                            <input type="text" maxlength="2" size="2" id="income<?=$k?>" value="<?=$v[10]?>">
<?
    } else if($v[11] == '입고완료') {
?>
                            <?=$v[10]?>
<?
    }
?>
                        </td>
                        <td><?=number_format($v[9] * $v[10])?></td>
                        <td><?=number_format(($v[9] * $v[10]) * 0.1)?></td>
                        <td><?=number_format(($v[9] * $v[10]) + ($v[9] * $v[10]) * 0.1)?></td>
                        <td>
                            <strong id="st<?=$k?>"><?=$v[11]?></strong>
<?
    if($v[11] == '출하') {
?>
                            <button type="button" class="btn btn-success btn-sm complete" data-group='{"income":"income<?=$k?>", "incomerow":"incomerow<?=$k?>", "btnid":"btn<?=$k?>", "st":"st<?=$k?>"}' id="btn<?=$k?>">입고처리</button>
<?
    }
?>
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

$(function() {
    $(".complete").each(function() {
        $(this).click(function() {
            if(confirm('Check Delivery Quantity?')) {
                alert('Complete');
                var incomeval = $("#"+$(this).data('group').income).val();
                var comeval = parseInt(incomeval,10);
                $("#"+$(this).data('group').btnid).hide();
                $("#"+$(this).data('group').incomerow).html(comeval.format());
                $("#"+$(this).data('group').st).html('입고완료');
            }
            return false;
        });
    });
});
</script>
