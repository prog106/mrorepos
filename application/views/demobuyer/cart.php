<? $this->load->view('demobuyer/topmenu'); ?>
<div class="container-fluid">
    <div class="row">
    <? $this->load->view('demobuyer/menu.php'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3 class="page-header">Cart Page</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Buy Check</th>
                        <th>Image</th>
                        <th class="col-sm-3">Code/Name</th>
                        <th>Company</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Price x Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
<?
foreach($cartlist as $k => $v) {
?>
                    <tr>
                        <td><div class="checkbox"><label><input type="checkbox" id="chkv<?=$k?>" class="chktp" checked>check</label></div></td>
                        <td><img src="<?=$v[0]?>"></td>
                        <td><?=$v[1]?> / <?=$v[2]?><br>Size <?=$v[3]?></td>
                        <td><?=$v[4]?></td>
                        <td><?=$v[5]?></td>
                        <td>RP. <?=number_format($v[6]);?><input type="hidden" id="p<?=$k?>" class="ct" value="<?=$v[6]?>" data-group='{"qid":"q<?=$k?>", "pqid":"pq<?=$k?>", "chkv":"chkv<?=$k?>"}'></td>
                        <td><input id="q<?=$k?>" type="text" size="2" maxlength="2" value="<?=$v[7]?>" class="qv"></td>
                        <td><div id="pq<?=$k?>"></div></td>
                    </tr>
<?
}
?>
                    <tr>
                        <td colspan="4"></td>
                        <td colspan="2">Total Price</td>
                        <td colspan="2"><div id="tpv"></div><input type="hidden" id="htpv" value="0"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="deliverydate" class="col-sm-3 control-label">Delivery Date</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="deliverydate" placeholder="Delivery Date" style="width:200px;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="deliveryaddr" class="col-sm-3 control-label">Delivery Address</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="deliveryaddr" placeholder="Delivery Address" value="515, sealul Bldg, 18 Teheran-ro33-gil, Gangnam-gu, Seoul, Korea">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="approval" class="col-sm-3 control-label">Approval</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="approval" style="width:150px;">
                            <option value="">-------</option>
                            <option value="ceo">Manager</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="order" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                        <button class="btn btn-danger" id="order">Order</button>
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
    return n;
};

function qv() {
    var tpv = 0;
    $('.ct').each(function() {
        var pv = $(this).val();
        var qv = $("#"+$(this).data('group').qid).val();
        $("#"+$(this).data('group').pqid).html('RP. ' + (pv * qv).format());
        if($("#"+$(this).data('group').chkv).prop('checked')) {
            tpv += parseInt(pv * qv,10);
        }
    });
    $("#tpv").html('RP. ' + tpv.format());
    $("#htpv").val(tpv);
}
qv();
$(function() {
    $('.qv').keyup(function() { qv(); });
    $('.chktp').change(function() { qv(); });
    $('#order').click(function() {
        if($("#htpv").val() == 0) {
            alert('Buy check, please');
            return false;
        }
        if(!$("#deliverydate").val()) {
            alert('Delivery Date, please');
            return false;
        }
        if(!$("#deliveryaddr").val()) {
            alert('Delivery Address, please');
            return false;
        }
        if(!$("#email").val()) {
            alert('Email, please');
            return false;
        }
        if(!$("#approval").val()) {
            alert('approval, please');
            return false;
        }
        if(confirm('order?')) {
            location.href='/demobuyer/approval';
        }
        return false;
    });
    $('#deliverydate').datepicker({ format: 'yyyy-mm-dd', startDate: '+1d' });
});
</script>
