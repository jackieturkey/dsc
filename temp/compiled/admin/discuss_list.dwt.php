<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title">商品 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">		
        	<div class="explanation" id="explanation">
            	<div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
                <ul>
                	<li>该页面展示了讨论主题相关信息列表。</li>
                    <li>可查看讨论详情、点击回复查看回复列表。</li>
                </ul>
            </div>
            <div class="flexilist">
            	<!--数据列表-->
                <div class="common-head">
                    <div class="fl">
                    	<a href="discuss_circle.php?act=add"><div class="fbutton"><div class="add" title="添加主题"><span><i class="icon icon-plus"></i>添加主题</span></div></div></a>
                    </div>				
                    <div class="refresh">
                    	<div class="refresh_tit" title="刷新数据"><i class="icon icon-refresh"></i></div>
                    	<div class="refresh_span">刷新 - 共<?php echo $this->_var['record_count']; ?>条记录</div>
                    </div>
					<div class="search">
                    	<div class="input">
                        	<input type="text" name="keywords" class="text nofocus" placeholder="关键字" autocomplete="off">
							<button class="btn" name="secrch_btn"></button>
                        </div>
                    </div>
                </div>
                <div class="common-content">
					<form method="POST" action="discuss_circle.php?act=batch_drop" name="listForm" onsubmit="return confirm_bath()">
                	<div class="list-div" id="listDiv">
                    	<div class="flexigrid ht_goods_list">
						<?php endif; ?>
                    	<table cellpadding="0" cellspacing="0" border="0">
                        	<thead>
                            	<tr>
                                	<th width="3%" class="sign"><div class="tDiv"><input type="checkbox" name="all_list" class="checkbox" id="all_list" /><label for="all_list" class="checkbox_stars"></label></div></th>
                                	<th width="5%"><div class="tDiv"><?php echo $this->_var['lang']['record_id']; ?></div></th>
                                    <th width="19%"><div class="tDiv"><?php echo $this->_var['lang']['discuss_title']; ?></div></th>
                                    <th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['user_name']; ?></div></th>
                                    <th width="7%"><div class="tDiv"><?php echo $this->_var['lang']['discuss_type']; ?></div></th>
                                    <th width="7%"><div class="tDiv"><?php echo $this->_var['lang']['goods_steps_name']; ?></div></th>
                                    <th width="26%"><div class="tDiv"><?php echo $this->_var['lang']['discuss_goods']; ?></div></th>
                                    <th width="9%"><div class="tDiv"><?php echo $this->_var['lang']['discuss_time']; ?></div></th>
                                    <th width="14%" class="handle"><?php echo $this->_var['lang']['handler']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php $_from = $this->_var['discuss_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'discuss');if (count($_from)):
    foreach ($_from AS $this->_var['discuss']):
?>
                            	<tr>
                                    <td class="sign"><div class="tDiv">
										<input type="checkbox" name="checkboxes[]" value="<?php echo $this->_var['discuss']['dis_id']; ?>" class="checkbox" id="checkbox_<?php echo $this->_var['discuss']['dis_id']; ?>" />
										<label for="checkbox_<?php echo $this->_var['discuss']['dis_id']; ?>" class="checkbox_stars"></label>
									</div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['discuss']['dis_id']; ?></div></td>
									<td><div class="tDiv"><?php echo $this->_var['discuss']['dis_title']; ?></div></td>
									<td><div class="tDiv"><?php if ($this->_var['discuss']['user_name']): ?><?php echo $this->_var['discuss']['user_name']; ?><?php else: ?><?php echo $this->_var['lang']['anonymous']; ?><?php endif; ?></div></td>
									<td><div class="tDiv"><?php if ($this->_var['discuss']['dis_type'] == 1): ?><?php echo $this->_var['lang']['discuss']; ?><?php elseif ($this->_var['discuss']['dis_type'] == 2): ?><?php echo $this->_var['lang']['technology']; ?><?php else: ?><?php endif; ?></div></td>
									<td><div class="tDiv"><?php echo $this->_var['discuss']['shop_name']; ?></div></td>
                                    <td><div class="tDiv"><a href="../goods.php?id=<?php echo $this->_var['discuss']['goods_id']; ?>" target="_blank"><?php echo $this->_var['discuss']['goods_name']; ?></a></div></td>                       
                                    <td><div class="tDiv"><?php echo $this->_var['discuss']['add_time']; ?></div></td>                       
                                    <td class="handle">
                                        <div class="tDiv ht_tdiv">
                                            <a href="discuss_circle.php?act=reply&amp;id=<?php echo $this->_var['discuss']['dis_id']; ?>" class="btn_see"><i class="sc_icon sc_icon_see"></i>查看</a>
                                            <a href="discuss_circle.php?act=user_reply&amp;id=<?php echo $this->_var['discuss']['dis_id']; ?>" class="btn_edit"><i class="icon icon-edit"></i>回复</a>
                                            <a href="javascript:" onclick="listTable.remove(<?php echo $this->_var['discuss']['dis_id']; ?>, '<?php echo $this->_var['lang']['drop_confirm']; ?>')" class="btn_trash"><i class="icon icon-trash"></i>删除</a>
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
                                                            <li><a href="javascript:;" data-value="remove" class="ftx-01"><?php echo $this->_var['lang']['drop_select']; ?></a></li>
                                                        </ul>
                                                        <input name="sel_action" type="hidden" value="remove" id="">
                                                    </div>
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
                    </div>
					</form>
                </div>
                <!--数据列表end-->
            </div>
		</div>
	</div>
 <?php echo $this->fetch('library/pagefooter.lbi'); ?>
	<script type="text/javascript" language="JavaScript">
	<!--
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

	  
	  function searchComment()
	  {
		  var keyword = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
		  if (keyword.length > 0)
		  {
			listTable.filter['keywords'] = keyword;
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
	//-->
	</script>
</body>
</html>
<?php endif; ?>
