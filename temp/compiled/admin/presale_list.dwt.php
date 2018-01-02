<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title">促销 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="explanation" id="explanation">
            	<div class="ex_tit">
					<i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span>
                    <?php if ($this->_var['open'] == 1): ?>
                    <div class="view-case">
                    	<div class="view-case-tit"><i></i>查看教程</div>
                        <div class="view-case-info">
                        	<a href="http://help.ecmoban.com/article-6554.html" target="_blank">第三方登录插件使用说明</a>
                        </div>
                    </div>			
                    <?php endif; ?>				
				</div>
                <ul>
                	<li>展示了预售活动的相关信息列表。</li>
                    <li>可通过搜索关键字商品名称，筛选店铺名称搜索出具体预售活动信息。</li>
                    <li>可进行增加、编辑、修改、删除等操作，查看预售活动订单。</li>
                </ul>
            </div>
            <div class="flexilist">
            	<div class="common-head">
                	<div class="fl">
                        <a href="presale.php?act=add"><div class="fbutton"><div class="add" title="添加预售活动"><span><i class="icon icon-plus"></i>添加预售活动</span></div></div></a>
						<a href="presale_cat.php?act=list"><div class="fbutton"><div class="open" title="预售分类列表"><span><i class="icon icon-screenshot"></i>预售分类列表</span></div></div></a>
                    </div>
                    <div class="refresh">
                    	<div class="refresh_tit" title="刷新数据"><i class="icon icon-refresh"></i></div>
                    	<div class="refresh_span">刷新 - 共<?php echo $this->_var['record_count']; ?>条记录</div>
                    </div>
                    <div class="search">
						<?php echo $this->fetch('library/search_store.lbi'); ?>
                        <div class="select m0">
                            <div class="imitate_select select_w170">
                                <div class="cite"><?php echo $this->_var['lang']['adopt_status']; ?></div>
                                <ul>
                                    <li><a href="javascript:;" data-value="0" class="ftx-01"><?php echo $this->_var['lang']['adopt_status']; ?></a></li>
                                    <li><a href="javascript:;" data-value="1" class="ftx-01"><?php echo $this->_var['lang']['not_audited']; ?></a></li>
                                    <li><a href="javascript:;" data-value="2" class="ftx-01"><?php echo $this->_var['lang']['audited_not_adopt']; ?></a></li>
                                    <li><a href="javascript:;" data-value="3" class="ftx-01"><?php echo $this->_var['lang']['audited_yes_adopt']; ?></a></li>
                                </ul>
                                <input name="review_status" type="hidden" value="0" id="">
                            </div>
                        </div>
                    	<div class="input">
                        	<input type="text" name="keyword" class="text nofocus" placeholder="商品名称" autocomplete="off" /><button class="btn" name="secrch_btn"></button>
                        </div>
                    </div>
                </div>
                <div class="common-content">
					<form method="post" action="presale.php?act=batch_drop" name="listForm" onsubmit="return confirm(batch_drop_confirm);">
                	<div class="list-div" id="listDiv" >
						<?php endif; ?>
                    	<table cellpadding="1" cellspacing="1" >
                        	<thead>
                            	<tr>
                                	<th width="3%" class="sign"><div class="tDiv"><input type="checkbox" name="all_list" class="checkbox" id="all_list" /><label for="all_list" class="checkbox_stars"></label></div></th>
                                    <th width="5%"><div class="tDiv"><?php echo $this->_var['lang']['record_id']; ?></div></th>
                                    <th width="20%"><div class="tDiv"><?php echo $this->_var['lang']['goods_name']; ?></div></th>
                                    <th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['goods_steps_name']; ?></div></th>
									<th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['current_status']; ?></div></th>
                                    <th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['end_date']; ?></div></th>
                                    <th width="6%"><div class="tDiv tc"><?php echo $this->_var['lang']['deposit']; ?></div></th>
                                    <th width="6%"><div class="tDiv tc"><?php echo $this->_var['lang']['valid_goods']; ?></div></th>
                                    <th width="7%"><div class="tDiv tc"><?php echo $this->_var['lang']['valid_order']; ?></div></th>
                                    <th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['adopt_status']; ?></div></th>
                                    <th width="15%" class="handle"><?php echo $this->_var['lang']['handler']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
							<?php $_from = $this->_var['presale_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'presale');if (count($_from)):
    foreach ($_from AS $this->_var['presale']):
?>
                            	<tr>
                                	<td class="sign"><div class="tDiv">
										<input type="checkbox" name="checkboxes[]" value="<?php echo $this->_var['presale']['act_id']; ?>" class="checkbox" id="checkbox_<?php echo $this->_var['presale']['act_id']; ?>" />
										<label for="checkbox_<?php echo $this->_var['presale']['act_id']; ?>" class="checkbox_stars"></label>
									</div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['presale']['act_id']; ?></div></td>
                                	<td><div class="tDiv"><a href="../presale.php?id=<?php echo $this->_var['presale']['act_id']; ?>&act=view" target="_blank"><?php echo htmlspecialchars($this->_var['presale']['act_name']); ?></div></a></td>
									<?php if ($this->_var['priv_ru'] == 1): ?>
                                    <td><div class="tDiv red"><?php echo $this->_var['presale']['shop_name']; ?></div></td>
                                    <?php endif; ?>
									<td><div class="tDiv"><?php echo $this->_var['presale']['cur_status']; ?></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['presale']['pay_end_time']; ?></div></td>
                                    <td><div class="tDiv tc"><?php echo $this->_var['presale']['deposit']; ?></div></td>
                                    <td><div class="tDiv tc"><?php echo $this->_var['presale']['total_goods']; ?></div></td>
									<td><div class="tDiv tc"><?php echo $this->_var['presale']['total_order']; ?></div></td>
                                    <td>
                                    	<div class="tDiv">
                                            <?php if ($this->_var['presale']['review_status'] == 1): ?>
                                            <font class="org2"><?php echo $this->_var['lang']['not_audited']; ?></font>
                                            <?php elseif ($this->_var['presale']['review_status'] == 2): ?>
                                            <font class="red"><?php echo $this->_var['lang']['audited_not_adopt']; ?></font><br/>
                                            <i class="tip yellow" title="<?php echo $this->_var['presale']['review_content']; ?>" data-toggle="tooltip"><?php echo $this->_var['lang']['prompt']; ?></i>
                                            <?php elseif ($this->_var['presale']['review_status'] == 3): ?>
                                            <font class="blue"><?php echo $this->_var['lang']['audited_yes_adopt']; ?></font>
                                            <?php endif; ?>									
                                        </div>
                                    </td>  
                                    <td class="handle">
										<div class="tDiv a3">
											<a href="order.php?act=list&amp;presale_id=<?php echo $this->_var['presale']['act_id']; ?>" title="<?php echo $this->_var['lang']['view_detail']; ?>" class="btn_see"><i class="sc_icon sc_icon_see"></i><?php echo $this->_var['lang']['order']; ?></a>
											<a href="presale.php?act=edit&amp;id=<?php echo $this->_var['presale']['act_id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" class="btn_edit"><i class="icon icon-edit"></i><?php echo $this->_var['lang']['edit']; ?></a>
											<a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['presale']['act_id']; ?>,'<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['remove']; ?>" class="btn_trash"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['remove']; ?></a>									
										</div>
									</td>
                                </tr>
							<?php endforeach; else: ?>
							<tr><td class="no-records" align="center" colspan="20"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
							<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>
                            <tfoot>
                            	<tr>
									<td colspan="14">
                                        <div class="tDiv">
                                            <div class="tfoot_btninfo">
                                              <div class="shenhe">
                                                  <input type="submit" name="drop" id="btnSubmit" value="<?php echo $this->_var['lang']['drop']; ?>" class="btn btn_disabled" disabled="true" ectype="btnSubmit" />
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
            </div>
        </div>
    </div>
 <?php echo $this->fetch('library/pagefooter.lbi'); ?>
<script type="text/javascript">
	//列表导航栏设置下路选项
	$(".ps-container").perfectScrollbar();
	
	//分页传值
	listTable.recordCount = '<?php echo $this->_var['record_count']; ?>';
	listTable.pageCount = '<?php echo $this->_var['page_count']; ?>';

	<?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
	listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</script>
</body>
</html>
<?php endif; ?>
