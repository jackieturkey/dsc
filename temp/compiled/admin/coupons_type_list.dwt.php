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
                        	<a href="http://help.ecmoban.com/article-6550.html" target="_blank">商城优惠券功能说明</a>
                        </div>
                    </div>			
                    <?php endif; ?>				
				</div>
                <ul>
                	<li>展示了优惠券的相关信息列表。</li>
                    <li>通过优惠券名称关键字、筛选使用类型搜索出具体优惠券信息。</li>
                </ul>
            </div>
            <div class="flexilist">
            	<div class="common-head">
                	<div class="fl">
                        <a href="coupons.php?act=add"><div class="fbutton"><div class="add" id="actionSpan" title="添加优惠券类型"><span><i class="icon icon-plus"></i>添加优惠券类型</span></div></div></a>
                    </div>
                    <div class="refresh">
                    	<div class="refresh_tit" title="刷新数据"><i class="icon icon-refresh"></i></div>
                    	<div class="refresh_span">刷新 - 共<?php echo $this->_var['record_count']; ?>条记录</div>
                    </div>
                    <div class="search">
						<div class="select">		
							<div id="" class="imitate_select select_w120">
								<div class="cite"><?php echo $this->_var['lang']['use_type']; ?></div>
								<ul>
									<li><a href="javascript:;" data-value="1,2,3,4" class="ftx-01"><?php echo $this->_var['lang']['use_type']; ?></a></li>
									<li><a href="javascript:;" data-value="1" class="ftx-01"><?php echo $this->_var['lang']['coupons_type_01']; ?></a></li>
									<li><a href="javascript:;" data-value="2" class="ftx-01"><?php echo $this->_var['lang']['coupons_type_02']; ?></a></li>
									<li><a href="javascript:;" data-value="3" class="ftx-01"><?php echo $this->_var['lang']['coupons_type_03']; ?></a></li>
									<li><a href="javascript:;" data-value="4" class="ftx-01"><?php echo $this->_var['lang']['coupons_type_04']; ?></a></li>
								</ul>
								<input name="cou_type" type="hidden" value="1,2,3,4" id="">
							</div>
						</div>			
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
                        	<input type="text" name="cou_name" class="text nofocus" placeholder="优惠券名称" autocomplete="off" /><button class="btn" name="secrch_btn"></button>
                        </div>
                    </div>
                </div>
                <div class="common-content">
				<form method="post" action="" name="listForm">
                	<div class="list-div" id="listDiv" >
						<?php endif; ?>
                    	<table cellpadding="1" cellspacing="1" >
                        	<thead>
                            	<tr>
                                    <th width="5%"><div class="tDiv"><?php echo $this->_var['lang']['record_id']; ?></div></th>
                                    <th width="18%"><div class="tDiv"><?php echo $this->_var['lang']['coupons_name']; ?></div></th>
                                    <th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['goods_steps_name']; ?></div></th>
                                    <th width="7%"><div class="tDiv"><?php echo $this->_var['lang']['coupons_type']; ?></div></th>
                                    <th width="7%"><div class="tDiv"><?php echo $this->_var['lang']['use_goods']; ?></div></th>
                                    <th width="7%"><div class="tDiv"><?php echo $this->_var['lang']['use_limit']; ?></div></th>
                                    <th width="7%"><div class="tDiv"><?php echo $this->_var['lang']['coupons_value']; ?></div></th>
                                    <th width="6%"><div class="tDiv"><?php echo $this->_var['lang']['give_out_amount']; ?></div></th>
                                    <th width="5%"><div class="tDiv"><?php echo $this->_var['lang']['valid_date']; ?></div></th>
									<th width="6%"><div class="tDiv"><?php echo $this->_var['lang']['is_overdue']; ?></div></th>
                                    <th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['adopt_status']; ?></div></th>
                                    <th width="15%" class="handle"><?php echo $this->_var['lang']['handler']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
							<?php $_from = $this->_var['cou_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vo');if (count($_from)):
    foreach ($_from AS $this->_var['vo']):
?>
                            <tr>
                                <td><div class="tDiv"><?php echo $this->_var['vo']['cou_id']; ?></div></td>
                                <td><div class="tDiv"><?php echo $this->_var['vo']['cou_name']; ?></div></td>
                                <td><div class="tDiv red"><?php echo $this->_var['vo']['user_name']; ?></div></td>
                                <td><div class="tDiv"><?php echo $this->_var['vo']['cou_type']; ?></div></td>
                                <td>
                                	<div class="tDiv">
                                    	<?php if (! $this->_var['vo']['cou_goods'] && ! $this->_var['vo']['spec_cat']): ?>
                                        	<?php echo $this->_var['lang']['goods_all']; ?>
                                        <?php elseif ($this->_var['vo']['cou_goods'] && ! $this->_var['vo']['spec_cat']): ?>
                                        	<?php echo $this->_var['lang']['goods_appoint']; ?>
                                        <?php elseif (! $this->_var['vo']['cou_goods'] && $this->_var['vo']['spec_cat']): ?>
                                        	<?php echo $this->_var['lang']['spec_cat']; ?>
                                        <?php endif; ?>	
                                    </div>
                                </td>
                                <td><div class="tDiv"><?php echo $this->_var['vo']['cou_man']; ?></div></td>
                                <td><div class="tDiv"><?php echo $this->_var['vo']['cou_money']; ?></div></td>
                                <td><div class="tDiv"><?php echo $this->_var['vo']['cou_total']; ?></div></td>
                                <td align="center"><div class="tDiv" style="padding-left:5px; padding-right:5px;"><?php echo $this->_var['vo']['cou_start_time']; ?> - <?php echo $this->_var['vo']['cou_end_time']; ?></div></td>
                                <td><div class="tDiv"><?php echo $this->_var['vo']['cou_is_time']; ?></div></td> 
                                <td>
                                    <div class="tDiv">
                                        <?php if ($this->_var['vo']['review_status'] == 1): ?>
                                        	<font class="org2"><?php echo $this->_var['lang']['not_audited']; ?></font>
                                        <?php elseif ($this->_var['vo']['review_status'] == 2): ?>
                                        	<font class="red"><?php echo $this->_var['lang']['audited_not_adopt']; ?></font><br/>
                                        	<i class="tip yellow" title="<?php echo $this->_var['vo']['review_content']; ?>" data-toggle="tooltip"><?php echo $this->_var['lang']['prompt']; ?></i>
                                        <?php elseif ($this->_var['vo']['review_status'] == 3): ?>
                                        	<font class="blue"><?php echo $this->_var['lang']['audited_yes_adopt']; ?></font>
                                        <?php endif; ?>									
                                    </div>
                                </td>
                                <td class="handle">
                                    <div class="tDiv a3">
                                        <a href="coupons.php?act=coupons_list&cou_id=<?php echo $this->_var['vo']['cou_id']; ?>" title="<?php echo $this->_var['lang']['view_detail']; ?>" class="btn_see"><i class="sc_icon sc_icon_see"></i><?php echo $this->_var['lang']['view']; ?></a>
                                        <a href="coupons.php?act=edit&cou_id=<?php echo $this->_var['vo']['cou_id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" class="btn_edit"><i class="icon icon-edit"></i><?php echo $this->_var['lang']['edit']; ?></a>
                                        <a href="javascript:;" onclick="coupons_del(<?php echo $this->_var['vo']['cou_id']; ?>)" title="<?php echo $this->_var['lang']['remove']; ?>" class="btn_trash"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['remove']; ?></a>									
                                    </div>
                                </td>
                            </tr>
							<?php endforeach; else: ?>
							<tr><td class="no-records" align="center" colspan="15"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
							<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>
                            <tfoot>
                            	<tr>
                                    <td colspan="15">
                                    	<div class="list-page">
											<?php echo $this->fetch('library/page.lbi'); ?>
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
        
        /* 优惠券删除 */
        function coupons_del(cou_id){
            if(confirm('确定删除吗?')){
                $.get('coupons.php?act=remove_coupons', {cou_id:cou_id}, function (data) {if(data=='ok')location.href=location.href;else alert('删除失败!')});
            }
        }
    </script>
</body>
</html>
<?php endif; ?>
