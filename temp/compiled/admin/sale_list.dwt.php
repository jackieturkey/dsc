<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>


<body class="iframe_body">
<div class="warpper">
    <div class="title">报表 - 销售统计</div>
    <div class="content">
        <div class="tabs_info">
            <ul>
                <li <?php if ($this->_var['menu_select']['current'] == 'sale_list'): ?>class="curr"<?php endif; ?>><a href="sale_list.php?act=list"><?php echo $this->_var['lang']['sale_list']; ?></a></li>
                <li <?php if ($this->_var['menu_select']['current'] == 'sell_stats'): ?>class="curr"<?php endif; ?>><a href="sale_order.php?act=goods_num"><?php echo $this->_var['lang']['sell_stats']; ?></a></li>
                <li <?php if ($this->_var['menu_select']['current'] == 'report_sell'): ?>class="curr"<?php endif; ?>><a href="sale_general.php?act=list"><?php echo $this->_var['lang']['report_sell']; ?></a></li>
            </ul>
        </div>
        <div class="explanation" id="explanation">
            <div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
            <ul>
                <li>统计所有销售统计信息。</li>
                <li>根据订单时间、订单类型、发货状态等筛选出某个时间段的订单信息。</li>
            </ul>
        </div>
        <div class="flexilist mt30">
            <div class="common-content">
                <div class="mian-info sale_info">
                    <div class="switch_info">
                        <form id="from1" name="from1">
                            <div class="items pb30 bor_bt_das">
                            <div class="item">
                                <div class="label"><em class="require-field">*</em>起止时间：</div>
                                <div class="label_value">
                                    <div class="text_time" id="text_time_start">
                                        <input type="text" class="text" name="use_start_date" id="use_start_date" value="<?php echo $this->_var['start_date']; ?>" readonly>
                                    </div>
                                    <span class="bolang">&nbsp;&nbsp;~&nbsp;&nbsp;</span>
                                    <div class="text_time" id="text_time_end">
                                        <input type="text" class="text" name="use_end_date" id="use_end_date" value="<?php echo $this->_var['end_date']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label">货号：</div>
                                <div class="label_value"><input type="text" name="goods_sn" class="text" autocomplete="off" /></div>
                            </div>
                            <div class="item">
                                <div class="label">订单时间类型：</div>
                                <div class="label_value">
                                    <div class="checkbox_items">
                                        <div class="checkbox_item">
                                            <input type="radio" checked="checked" name="time_type1" value="0" class="ui-radio" id="delivery_time" />
                                            <label for="delivery_time" class="ui-radio-label">发货时间</label>
                                        </div>
                                        <div class="checkbox_item">
                                            <input type="radio" name="time_type1" value="1" class="ui-radio" id="placeOrder_time" />
                                            <label for="placeOrder_time" class="ui-radio-label">下单时间</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label">订单状态：</div>
                                <div class="label_value">
                                    <div class="checkbox_items">
                                        <?php $_from = $this->_var['os_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'os');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['os']):
?>
                                        <div class="checkbox_item">
                                            <input type="checkbox" name="order_status" value="<?php echo $this->_var['key']; ?>" class="ui-checkbox" id="order_status_0<?php echo $this->_var['key']; ?>" />
                                            <label for="order_status_0<?php echo $this->_var['key']; ?>" class="ui-label"><?php echo $this->_var['os']; ?></label>
                                        </div>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label">发货状态：</div>
                                <div class="label_value">
                                    <div class="checkbox_items">
                                        <?php $_from = $this->_var['ss_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'ss');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['ss']):
?>
                                        <div class="checkbox_item">
                                            <input type="checkbox" name="shipping_status" value="<?php echo $this->_var['key']; ?>" class="ui-checkbox" id="shipping_status_0<?php echo $this->_var['key']; ?>" />
                                            <label for="shipping_status_0<?php echo $this->_var['key']; ?>" class="ui-label"><?php echo $this->_var['ss']; ?></label>
                                        </div>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="item mt20">
                                <div class="label">&nbsp;</div>
                                <div class="label_value">
                                    <a href="javascript:void(0);" onclick="getList(this)" class="btn btn30 blue_btn" ectype="query"><i class="icon icon-search"></i>查询</a>
                                </div>
                            </div>
                        </div>
                        </form>

                        <div class="query_result mt30">
                            <div class="common-head">
                                <div class="fl">
                                    <div class="fbutton m0" id="fbutton_1"><a href="javascript:void(0);"><div class="csv" title="导出数据"><span><i class="icon icon-download-alt"></i>导出列表</span></div></a></div>
                                </div>
                                <div class="refresh">
                                    <div class="refresh_tit" onclick="getList(this)" title="刷新数据"><i class="icon icon-refresh"></i></div>

                                </div>
                            </div>
                            <div class="list-div" id="listDiv" style="position: relative">
                            	<?php endif; ?>
                                <div class="refresh_span" style="position: absolute;left:135px;top: 0px;">刷新 - 共<?php echo $this->_var['record_count']; ?>条记录</div>
                                <table cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                    <tr>
                                        <th width="10%"><div class="tDiv">商家名称</div></th>
                                        <th width="10%"><div class="tDiv">货号</div></th>
                                        <th width="30%"><div class="tDiv">商品名称</div></th>
                                        <th width="10%"><div class="tDiv">订单号</div></th>
                                        <th width="10%"><div class="tDiv">数量</div></th>
                                        <th width="10%"><div class="tDiv">售价</div></th>
                                        <th width="10%"><div class="tDiv">总金额</div></th>
                                        <th width="10%"><div class="tDiv">售出日期</div></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $_from = $this->_var['goods_sales_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vo');if (count($_from)):
    foreach ($_from AS $this->_var['vo']):
?>
                                    <tr>
                                        <td><div class="tDiv"><?php echo $this->_var['vo']['shop_name']; ?></div></td>
                                        <td><div class="tDiv"><?php echo $this->_var['vo']['goods_sn']; ?></div></td>
                                        <td><div class="tDiv"><?php echo $this->_var['vo']['goods_name']; ?></div></td>
                                        <td><div class="tDiv"><?php echo $this->_var['vo']['order_sn']; ?></div></td>
                                        <td><div class="tDiv"><?php echo $this->_var['vo']['goods_num']; ?></div></td>
                                        <td><div class="tDiv"><?php echo $this->_var['vo']['sales_price']; ?></div></td>
                                        <td><div class="tDiv"><?php echo $this->_var['vo']['total_fee']; ?></div></td>
                                        <td><div class="tDiv"><?php echo $this->_var['vo']['sales_time']; ?></div></td>
                                    </tr>
                                    <?php endforeach; else: ?>
                                    <tr>
                                        <td colspan="12" class="no_record"><div class="tDiv"><?php echo $this->_var['lang']['no_records']; ?></div></td>
                                    </tr>
                                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="12">
                                            <div class="list-page">
                                                <?php echo $this->fetch('library/page.lbi'); ?>
                                            </div>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                                
                                <script type="text/javascript">
								listTable.recordCount = '<?php echo $this->_var['record_count']; ?>';
								listTable.pageCount = '<?php echo $this->_var['page_count']; ?>';
							
								<?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
								listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								</script>
                                
							<?php if ($this->_var['full_page']): ?>								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <?php echo $this->fetch('library/pagefooter.lbi'); ?>
</body>
<script type="text/javascript">

    //时间选择1
    var opts1 = {
        'targetId':'use_start_date',//时间写入对象的id
        'triggerId':['use_start_date'],//触发事件的对象id
        'alignId':'text_time_start',//日历对齐对象
        'format':'-',//时间格式 默认'YYYY-MM-DD HH:MM:SS'
        'min':'' //最小时间
    },opts2 = {
        'targetId':'use_end_date',
        'triggerId':['use_end_date'],
        'alignId':'text_time_end',
        'format':'-',
        'min':''
    }
    xvDate(opts1);
    xvDate(opts2);

    function getList()
    {
        var act = 'query';
        var start_date = $('#from1 input[name=use_start_date]').val();//起始时间
        var end_date = $('#from1 input[name=use_end_date]').val();//截止时间
        var goods_sn = $('#from1 input[name=goods_sn]').val();//货号
        var time_type = $('#from1 input[name=time_type1]').val();//订单时间类型
        var order_status ='';//订单状态
            $('#from1 input[name=order_status]:checked').each(function(i){
            if(0==i)
                order_status = $(this).val();
            else
                order_status += (","+$(this).val());
            });
        var shipping_status ='';//发货状态
        $('#from1 input[name=shipping_status]:checked').each(function(i){
            if(0==i)
                shipping_status = $(this).val();
            else
                shipping_status += (","+$(this).val());
        });

        $.ajax({
            url:"sale_list.php?is_ajax=1",
            dataType:"json",
            type:'post',
            data:{
                "act" : act,
                "start_date" : start_date,
                "end_date" : end_date,
                "goods_sn" : goods_sn,
                "time_type" : time_type,
                "order_status" : order_status,
                "shipping_status" : shipping_status,
            },
            success:function(data){

                $('.list-div').eq(0).html(data.content);
            }
        })
    }

    //导出报表(销售明细)
    $('#fbutton_1').click(function(){
        var start_date=$('#from1 input[name=use_start_date]').val();
        var end_date=$('#from1 input[name=use_end_date]').val();
        var goods_sn=$('#from1 input[name=goods_sn]').val();
        var time_type = $('#from1 input[name=time_type]:checked').val() != undefined ? $('#from1 input[name=time_type]:checked').val() : 0;
        var order_status ='';//订单状态
        $('#from1 input[name=order_status]:checked').each(function(i){
            if(0==i)
                order_status = $(this).val();
            else
                order_status += (","+$(this).val());
        });
        var shipping_status ='';//发货状态
        $('#from1 input[name=shipping_status]:checked').each(function(i){
            if(0==i)
                shipping_status = $(this).val();
            else
                shipping_status += (","+$(this).val());
        });
        location.href='sale_list.php?act=download&start_date='+start_date+'&end_date='+end_date+'&goods_sn='+goods_sn+'&order_status='+order_status+'&shipping_status='+shipping_status+'&time_type='+time_type;
    });
</script>
</html>
<?php endif; ?>