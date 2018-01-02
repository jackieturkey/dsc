<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title">商品 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="tabs_info">
            	<ul>
                    <li <?php if ($this->_var['menu_select']['current'] == 'sale_notice'): ?>class="curr"<?php endif; ?>><a href="sale_notice.php?act=list">商品降价通知</a></li>
                    <li <?php if ($this->_var['menu_select']['current'] == 'notice_logs'): ?>class="curr"<?php endif; ?>><a href="notice_logs.php?act=list">降价通知日志</a></li>
                </ul>
            </div>			
        	<div class="explanation" id="explanation">
            	<div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
                <ul>
                	<li>前台会员可在商品详情页进行选择降价通知。</li>
                    <li>可进行发送状态筛选、客户邮箱搜索。</li>
                </ul>
            </div>
            <div class="flexilist">
            	<!--商品列表-->
                <div class="common-head">
                    <div class="refresh ml0">
                    	<div class="refresh_tit" title="刷新数据"><i class="icon icon-refresh"></i></div>
                    	<div class="refresh_span">刷新 - 共<?php echo $this->_var['record_count']; ?>条记录</div>
                    </div>
					<div class="search">
						<div class="select">
							<div class="fl">发送状态：</div>
							<div id="" class="imitate_select select_w170">
								<div class="cite">请选择</div>
								<ul>
									<li><a href="javascript:;" data-value="0" class="ftx-01"><?php echo $this->_var['lang']['please_select']; ?></a></li>
									<li><a href="javascript:;" data-value="2" class="ftx-01"><?php echo $this->_var['lang']['not_send_out']; ?></a></li>
									<li><a href="javascript:;" data-value="1" class="ftx-01"><?php echo $this->_var['lang']['already_send_out']; ?></a></li>
									<li><a href="javascript:;" data-value="3" class="ftx-01"><?php echo $this->_var['lang']['sys_send_out_fail']; ?></a></li>
								</ul>
								<input name="send_status" type="hidden" value="0" id="">
							</div>						
						</div>				
                    	<div class="input">
                        	<input type="text" name="keywords" class="text nofocus" placeholder="客户邮箱" autocomplete="off">
							<button class="btn" name="secrch_btn"></button>
                        </div>
                    </div>
                </div>
                <div class="common-content">
					<form method="POST" action="sale_notice.php?act=batch_drop" name="listForm" onsubmit="return confirm_bath()">
                	<div class="list-div" id="listDiv">
						<?php endif; ?>
                    	<table cellpadding="0" cellspacing="0" border="0">
                        	<thead>
                            	<tr>
                                	<th width="3%" class="sign"><div class="tDiv"><input type="checkbox" name="all_list" class="checkbox" id="all_list" /><label for="all_list" class="checkbox_stars"></label></div></th>
                                	<th width="5%"><div class="tDiv"><?php echo $this->_var['lang']['record_id']; ?></div></th>
                                    <th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['user_name']; ?></div></th>
                                    <th width="25%"><div class="tDiv"><?php echo $this->_var['lang']['goods_name']; ?></div></th>
                                    <th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['goods_steps_name']; ?></div></th>
                                    <th width="8%"><div class="tDiv">手机邮箱</div></th>
                                    <th width="5%"><div class="tDiv"><?php echo $this->_var['lang']['goods_present_price']; ?></div></th>
                                    <th width="5%"><div class="tDiv"><?php echo $this->_var['lang']['expect_price']; ?></div></th>
                                    <th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['apply_time']; ?></div></th>
                                    <th width="7%"><div class="tDiv"><?php echo $this->_var['lang']['send_out_state']; ?></div></th>
                                    <th width="5%" class="handle"><?php echo $this->_var['lang']['handler']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php $_from = $this->_var['notice_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
                            	<tr>
                                    <td class="sign">
                                        <div class="tDiv">
                                            <input type="checkbox" name="checkboxes[]" value="<?php echo $this->_var['list']['id']; ?>" class="checkbox" id="checkbox_<?php echo $this->_var['list']['id']; ?>" />
                                            <label for="checkbox_<?php echo $this->_var['list']['id']; ?>" class="checkbox_stars"></label>
                                        </div>
                                    </td>
                                    <td><div class="tDiv"><?php echo $this->_var['list']['id']; ?></div></td>
									<td><div class="tDiv"><?php echo $this->_var['list']['user_name']; ?></div></td>
									<td><div class="tDiv"><a href="<?php echo $this->_var['list']['goods_link']; ?>" target="_blank"><?php echo $this->_var['list']['goods_name']; ?></a></div></td>
									<td><div class="tDiv"><font style="color:#F00"><?php echo $this->_var['list']['shop_name']; ?></font></div></td>
									<td>
                                    <div class="tDiv">
                                    	<p><?php echo $this->_var['list']['cellphone']; ?></p>
                                        <p><?php echo $this->_var['list']['email']; ?></p>
                                    </div>
                                    </td>
                                    <td><div class="tDiv"><?php echo $this->_var['list']['shop_price']; ?></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['list']['hopeDiscount']; ?></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['list']['add_time']; ?></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['list']['status']; ?></div></td>                            
                                    <td class="handle">
                                        <div class="tDiv a1">
                                            <a href="sale_notice.php?act=view&amp;id=<?php echo $this->_var['list']['id']; ?>" class="btn_edit"><i class="icon icon-edit"></i>编辑</a>								
                                        </div>
                                    </td>
                                </tr>
								<?php endforeach; else: ?>
								<tr><td class="no-records"  colspan="20"><?php echo $this->_var['lang']['no_records']; ?></td></tr>								
								<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>
                            <tfoot>
                            	<tr>
                                	<td colspan="12">
                                        <div class="tDiv">
                                            <div class="tfoot_btninfo">
                                              <div class="shenhe">
                                                <div id="" class="imitate_select select_w120">
                                                    <div class="cite">请选择</div>
                                                    <ul>
                                                        <li><a href="javascript:;" data-value="remove" class="ftx-01"><?php echo $this->_var['lang']['drop']; ?></a></li>
                                                    </ul>
                                                    <input name="sel_action" type="hidden" value="remove" id="">
                                                </div>
                                                  <input type="hidden" name="act" value="batch" />
                                                  <input type="submit" name="drop" id="btnSubmit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="btn btn_disabled" disabled="true" ectype="btnSubmit" />
                                              </div>
                                            </div>
                                            <div class="list-page">
                                               <?php echo $this->fetch('library/page.lbi'); ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
						<?php if ($this->_var['full_page']): ?>
                    </div>
					</form>
                </div>
                <!--商品列表end-->
            </div>
		</div>
	</div>
 	<?php echo $this->fetch('library/pagefooter.lbi'); ?>
	<script type="text/javascript" language="JavaScript">
	  listTable.recordCount = '<?php echo $this->_var['record_count']; ?>';
	  listTable.pageCount = '<?php echo $this->_var['page_count']; ?>';
	  cfm = new Object();
	  cfm['allow'] = '<?php echo $this->_var['lang']['cfm_allow']; ?>';
	  cfm['remove'] = '<?php echo $this->_var['lang']['cfm_remove']; ?>';
	  cfm['deny'] = '<?php echo $this->_var['lang']['cfm_deny']; ?>';

	  <?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
	  listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	  /**
	   * 搜索评论
	   */
	  function searchComment()
	  {
		  var keyword = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
		  var send_status = document.forms['searchForm'].elements['send_status'].value;
		  if (keyword.length > 0 ||　send_status)
		  {
			listTable.filter['keywords'] = keyword;
			listTable.filter['send_status'] = send_status;
			listTable.filter.page = 1;
			listTable.loadList();
		  }
		  else
		  {
			  document.forms['searchForm'].elements['keyword'].focus();
		  }
	  }
	  

	  function confirm_bath()
	  {
		var action = document.forms['listForm'].elements['sel_action'].value;

		return confirm(cfm[action]);
	  }
	</script>
</body>
</html>
<?php endif; ?>
