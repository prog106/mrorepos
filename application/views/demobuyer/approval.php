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
                        <th>check</th>
                        <th>Order No</th>
                        <th>Product No</th>
                        <th style="width:80px">Order Date</th>
                        <th>Request Delivery Date</th>
                        <th>대금지급부서</th>
                        <th>Product Info</th>
                        <th>Unit</th>
                        <th>Price(RP.)</th>
                        <th>Quantity(RP.)</th>
                        <th>Tatal Price(RP.)</th>
                        <th>VAT(RP.)</th>
                        <th>Total Price + VAT(RP.)</th>
                        <th>Status</th>
                        <th>Del</th>
                        </tr>
                    </thead>
                    <tbody>
<?
foreach($orderlist as $k => $v) {
    if($v[11] != "신규주문") continue;
?>
                    <tr id="row<?=$k?>">
                        <td id="chkappr<?=$k?>"><div class="checkbox"><label><input type="checkbox" class="chkappr" data-group='{"chkappr":"chkappr<?=$k?>", "row":"row<?=$k?>", "st":"st<?=$k?>", "ocnt":"ocnt<?=$k?>", "cnt":"cnt<?=$k?>", "trash":"trash<?=$k?>"}' checked>check</label></div></td>
                        <td><?=$v[0]?></td>
                        <td><?=$v[1]?></td>
                        <td><?=$v[2]?></td>
                        <td><?=$v[3]?></td>
                        <td><?=$v[12]?></td>
                        <td><strong><?=$v[5]?></strong><br><?=$v[6]?></td>
                        <td><?=$v[8]?></td>
                        <td><?=number_format($v[9])?><input type="hidden" id="price<?=$k?>" value="<?=$v[9]?>"></td>
                        <td id="ocnt<?=$k?>"><input type="text" maxlength="2" size="2" value="<?=number_format($v[10])?>" class="cnt" id="cnt<?=$k?>" data-group='{"total":"total<?=$k?>", "vat":"vat<?=$k?>", "totalvat":"totalvat<?=$k?>", "price":"price<?=$k?>"}'></td>
                        <td id="total<?=$k?>"><?=number_format($v[9] * $v[10])?></td>
                        <td id="vat<?=$k?>"><?=number_format(($v[9] * $v[10]) * 0.1)?></td>
                        <td id="totalvat<?=$k?>"><?=number_format(($v[9] * $v[10]) + ($v[9] * $v[10]) * 0.1)?></td>
                        <td id="st<?=$k?>"><strong id="st<?=$k?>"><?=$v[11]?></strong></td>
                        <td id="trash<?=$k?>"><button type="button" class="btn btn-danger btn-sm trash" data-group='{"row":"row<?=$k?>"}'><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></td>
                    </tr>
<?
}
?>
                    <tr>
                        <td colspan="12"></td>
                        <td colspan="3"><button type="button" class="btn btn-success btn-sm" id="approval" data-group='{"cnt":"cnt<?=$k?>", "row":"row<?=$k?>", "st":"st<?=$k?>", "ocnt":"ocnt<?=$k?>"}'>승인하기</button></td>
                    </tr>
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

function chg() {
    $('.cnt').each(function() {
        var cntval = $(this).val();
        var priceval = $("#"+$(this).data('group').price).val();
        $("#"+$(this).data('group').total).html((cntval * priceval).format());
        $("#"+$(this).data('group').vat).html((cntval * priceval * 0.1).format());
        $("#"+$(this).data('group').totalvat).html(((cntval * priceval) + (cntval * priceval * 0.1)).format());
    });
}

$(function() {
    $('.cnt').keyup(function() { chg(); });
    $('.trash').each(function() {
        $(this).click(function() {
            if(confirm('정말 삭제하시겠습니까?')) {
                $("#"+$(this).data('group').row).hide();
                return false;
            }
            return false;
        });
    });
    $("#approval").click(function() {
        if(confirm('Approval?')) {
            var errval = 0;
            $(".chkappr").each(function() {
                if($(this).prop('checked')) {
                    var cntval = $("#"+$(this).data('group').cnt).val();
                    if(cntval > 0) {
                        $("#"+$(this).data('group').chkappr).html('');
                        $("#"+$(this).data('group').trash).html('');
                        $("#"+$(this).data('group').ocnt).html(cntval);
                        $("#"+$(this).data('group').st).html('<strong>주문확정</strong>');
                    } else {
                        errval++;
                    }
                }
            });
            if(errval > 0) {
                alert('주문수량이 0인 주문이 있습니다. 확인해 주세요');
            }
        }
    });
    $('#deliverydate').datepicker({ format: 'yyyy-mm-dd', startDate: '+1d' });
});
</script>
