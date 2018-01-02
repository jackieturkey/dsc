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
                        	<a href="http://help.ecmoban.com/article-6548.html" target="_blank">商城积分商城活动说明</a>
                        </div>
                    </div>			
                    <?php endif; ?>				
				</div>
                <ul>
                	<li>展示了积分商城商品的相关信息列表。</li>
                    <li>可通过搜索关键字商品名称，筛选店铺名称搜索出具体积分商城商品信息。</li>
                    <li>点击查看直接进入前台兑换积分商品信息页面，进行添加、编辑、删除等操作。</li>
                </ul>
            </div>
            <div class="flexilist">
            	<div class="common-head">
                	<div class="fl">
                        <a href="exchange_goods.php?act=add"><div class="fbutton"><div class="add" title="添加新商品"><span><i class="icon icon-plus"></i>添加新商品</span></div></div></a>
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
					<form method="POST" action="exchange_goods.php?act=batch_remove" name="listForm">
                	<div class="list-div" id="listDiv" >
						<?php endif; ?>
                    	<table cellpadding="1" cellspacing="1" >
                        	<thead>
                            	<tr>
                                	<th width="3%" class="sign"><div class="tDiv"><input type="checkbox" name="all_list" class="checkbox" id="all_list" /><label for="all_list" class="checkbox_stars"></label></div></th>
                                    <th width="5%"><div class="tDiv"><?php echo $this->_var['lang']['goods_id']; ?></div></th>
                                    <th width="22%"><div class="tDiv"><?php echo $this->_var['lang']['goods_name']; ?></div></th>
                                    <th width="12%"><div class="tDiv"><?php echo $this->_var['lang']['goods_steps_name']; ?></div></th>
                                    <th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['exchange_integral']; ?></div></th>
                                    <th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['is_exchange']; ?></div></th>
                                    <th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['is_hot']; ?></div></th>
                                    <th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['is_best']; ?></div></th>
                                    <th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['adopt_status']; ?></div></th>
                                    <th width="16%" class="handle"><?php echo $this->_var['lang']['handler']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
							<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
							<tr>
								<td class="sign">
                                    <div class="tDiv">
                                        <input type="checkbox" name="checkboxes[]" value="<?php echo $this->_var['list']['eid']; ?>" class="checkbox" id="checkbox_<?php echo $this->_var['list']['eid']; ?>" />
                                        <label for="checkbox_<?php echo $this->_var['list']['eid']; ?>" class="checkbox_stars"></label>
                                    </div>
                                </td>
								<td><div class="tDiv"><?php echo $this->_var['list']['eid']; ?></div></td>
								<td><div class="tDiv"><?php echo htmlspecialchars($this->_var['list']['goods_name']); ?></div></td>
								<td><div class="tDiv red"><?php if ($this->_var['list']['user_name']): ?><font style="color:#F00;"><?php echo $this->_var['list']['user_name']; ?></font><?php else: ?><font class="blue"><?php echo $this->_var['lang']['self']; ?></font><?php endif; ?></div></td>
								<td><div class="tDiv"><?php echo $this->_var['list']['exchange_integral']; ?></div></td>
								<td>
                                    <div class="tDiv">
                                        <div class="switch mauto <?php if ($this->_var['list']['is_exchange']): ?>active<?php endif; ?>" onclick="listTable.switchBt(this, 'toggle_exchange', <?php echo $this->_var['list']['goods_id']; ?>)" title="是">
                                            <div class="circle"></div>
                                        </div>
                                        <input type="hidden" value="0" name="">
                                    </div>
                                </td>
								<td>
                                    <div class="tDiv">
                                        <div class="switch mauto <?php if ($this->_var['list']['is_hot']): ?>active<?php endif; ?>" onclick="listTable.switchBt(this, 'toggle_hot', <?php echo $this->_var['list']['goods_id']; ?>)" title="是">
                                            <div class="circle"></div>
                                        </div>
                                        <input type="hidden" value="0" name="">
                                    </div>
                                </td>
								<td>
                                    <div class="tDiv">
                                        <div class="switch mauto <?php if ($this->_var['list']['is_best']): ?>active<?php endif; ?>" onclick="listTable.switchBt(this, 'toggle_best', <?php echo $this->_var['list']['goods_id']; ?>)" title="是">
                                            <div class="circle"></div>
                                        </div>
                                        <input type="hidden" value="0" name="">
                                    </div>
                                </td>    
                                <td>
                                    <div class="tDiv">
                                        <?php if ($this->_var['list']['review_status'] == 1): ?>
                                        <font class="org2"><?php echo $this->_var['lang']['not_audited']; ?></font>
                                        <?php elseif ($this->_var['list']['review_status'] == 2): ?>
                                        <font class="red"><?php echo $this->_var['lang']['audited_not_adopt']; ?></font><br/>
                                        <i class="tip yellow" title="<?php echo $this->_var['list']['review_content']; ?>" data-toggle="tooltip"><?php echo $this->_var['lang']['prompt']; ?></i>
                                        <?php elseif ($this->_var['list']['review_status'] == 3): ?>
                                        <font class="blue"><?php echo $this->_var['lang']['audited_yes_adopt']; ?></font>
                                        <?php endif; ?>									
                                    </div>
                                </td>   
								<td class="handle">
									<div class="tDiv a3">
										<a href="../exchange.php?id=<?php echo $this->_var['list']['goods_id']; ?>&act=view" target="_blank" title="<?php echo $this->_var['lang']['view_detail']; ?>" class="btn_see"><i class="sc_icon sc_icon_see"></i><?php echo $this->_var['lang']['view']; ?></a>
										<a href="exchange_goods.php?act=edit&id=<?php echo $this->_var['list']['goods_id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" class="btn_edit"><i class="icon icon-edit"></i><?php echo $this->_var['lang']['edit']; ?></a>
										<a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['list']['goods_id']; ?>,'<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['remove']; ?>" class="btn_trash"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['remove']; ?></a>									
									</div>
								</td>
							</tr>
							<?php endforeach; else: ?>
							<tr><td class="no-records" align="center" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
							<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>
                            <tfoot>
                            	<tr>
									<td colspan="12">
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
