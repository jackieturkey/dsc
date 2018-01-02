<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>
<script type="text/javascript" src="../js/calendar.php?lang=<?php echo $this->_var['cfg_lang']; ?>"></script>
<link href="../js/calendar/calendar.min.css" rel="stylesheet" type="text/css" />

<body class="iframe_body">
	<div class="warpper">
    	<div class="title">邮件 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">		
        	<div class="explanation" id="explanation">
            	<div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
                <ul>
                	<li>前台在个人中心我的收藏中可点击爱心按钮进行商品关注，后台生成关注列表。</li>
                    <li>当插入发送列表下拉框选择为高时，则商品信息发生变化，会发送邮件通知。</li>
                </ul>
            </div>
            <div class="flexilist">
            	<!--商品列表-->
                <div class="common-head">
					<div class="fl">
						<form action="attention_list.php" method="post">
							<label class="fl lh28"><?php echo $this->_var['lang']['batch_note']; ?></label>
							<input type="hidden" name="act" value="batch_addtolist" />
							<div class="text_time" id="text_time1">
							<input name="date" type="text" class="text text_2" id="date" size="10" value='' readonly />
							</div>
							<div class="imitate_select select_w120">
								<div class="cite">请选择</div>
								<ul>
									<li><a href="javascript:;" data-value="0" class="ftx-01"><?php echo $this->_var['lang']['pri']['0']; ?></a></li>
									<li><a href="javascript:;" data-value="1" class="ftx-01"><?php echo $this->_var['lang']['pri']['1']; ?></a></li>
								</ul>
								<input name="pri" type="hidden" value="0">
							</div>
							<input type="submit" value="<?php echo $this->_var['lang']['attention_addtolist']; ?>" class="btn btn30 red_btn" />
						</form>
					</div>				
                    <div class="refresh" style="margin-top:3px;">
                    	<div class="refresh_tit" title="刷新数据"><i class="icon icon-refresh"></i></div>
                    	<div class="refresh_span">刷新 - 共<?php echo $this->_var['record_count']; ?>条记录</div>
                    </div>
					<div class="search">			
                    	<div class="input">
                        	<input type="text" name="goods_name" class="text nofocus" placeholder="商品名称" autocomplete="off">
							<button class="btn" name="secrch_btn"></button>
                        </div>
                    </div>
                </div>
                <div class="common-content">
                	<div class="list-div" id="listDiv">
						<?php endif; ?>
                    	<table cellpadding="0" cellspacing="0" border="0">
                        	<thead>
                            	<tr>
                                	<th width="70%"><div class="tDiv"><?php echo $this->_var['lang']['goods_name']; ?></div></th>
                                    <th width="15%"><div class="tDiv"><?php echo $this->_var['lang']['goods_last_update']; ?></div></th>
                                    <th width="15%"><div class="tDiv"><?php echo $this->_var['lang']['attention_addtolist']; ?></div></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php $_from = $this->_var['goodsdb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?>
                            	<tr>
                                    <td><div class="tDiv"><a href="../goods.php?id=<?php echo $this->_var['val']['goods_id']; ?>" target="_blank"><?php echo $this->_var['val']['goods_name']; ?></a></div></td>
									<td><div class="tDiv"><?php echo $this->_var['val']['last_update']; ?></div></td>                             
                                    <td>
                                        <div class="tDiv">
                                            <form action="attention_list.php" method="post" name="form">
                                                <input type="hidden" name="id" value="<?php echo $this->_var['val']['goods_id']; ?>" />
                                                <input type="hidden" name="act" value="addtolist" />
                                                <div id="pri_div" class="imitate_select select_w75">
                                                    <div class="cite">请选择</div>
                                                    <ul>
                                                        <li><a href="javascript:;" data-value="0" class="ftx-01"><?php echo $this->_var['lang']['pri']['0']; ?></a></li>
                                                        <li><a href="javascript:;" data-value="1" class="ftx-01"><?php echo $this->_var['lang']['pri']['1']; ?></a></li>
                                                    </ul>
                                                    <input name="pri" id="pri" type="hidden" value="0">
                                                </div>
                                                <input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="btn btn30 red_btn" />
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; else: ?>
                                    <tr><td class="no-records" colspan="20"><?php echo $this->_var['lang']['no_records']; ?></td></tr>								
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
						<?php if ($this->_var['full_page']): ?>
                    </div>
                </div>
                <!--商品列表end-->
            </div>
		</div>
	</div>
 	<?php echo $this->fetch('library/pagefooter.lbi'); ?>
    
	<script type="text/javascript">
	listTable.recordCount = '<?php echo $this->_var['record_count']; ?>';
	listTable.pageCount = '<?php echo $this->_var['page_count']; ?>';
	<!-- <?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?> -->
	listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
	<!-- <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> -->
	//日期选择插件调用start sunle
	var opts1 = {
		'targetId':'date',//时间写入对象的id
		'triggerId':['date'],//触发事件的对象id
		'alignId':'text_time1',//日历对齐对象
		'format':'-'//时间格式 默认'YYYY-MM-DD HH:MM:SS'
	}
	xvDate(opts1);
	//日期选择插件调用end sunle
	</script>
    
</body>
</html>
<?php endif; ?>
