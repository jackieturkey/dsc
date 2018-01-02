<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title"><a href="<?php echo $this->_var['action_link']['href']; ?>" class="s-back"></a>商家 - 店铺模板管理</div>
        <div class="content">
			<?php echo $this->fetch('library/seller_manage_tab.lbi'); ?>
        	<div class="explanation" id="explanation">
            	<div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
                <ul>
                	<li>请选择合适的店铺模板。</li>
                    <li>更多模板持续开发中。</li>
                </ul>
            </div>
            <div class="flexilist">
                <div class="common-content">
                	<div class="mian-info">
                        <div class="template-list template-ksh-list mt10">
                        	<ul>
								<?php $_from = $this->_var['available_templates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'template');$this->_foreach['template'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['template']['total'] > 0):
    foreach ($_from AS $this->_var['template']):
        $this->_foreach['template']['iteration']++;
?>
                            	<li <?php if ($this->_var['default_tem'] == $this->_var['template']['code']): ?>class="curr"<?php endif; ?>>
                                	<div class="tit"><?php echo $this->_var['template']['name']; ?>-<a href="<?php if ($this->_var['template']['author_uri']): ?><?php echo $this->_var['template']['author_uri']; ?><?php else: ?>#<?php endif; ?>" target="_blank"/><?php echo $this->_var['template']['author']; ?></a></div>
                                    <div class="span"><?php echo $this->_var['template']['desc']; ?></div>
                                    <div class="img">
                                    	<?php if ($this->_var['template']['screenshot']): ?><img width="263" height="338" src="<?php echo $this->_var['template']['screenshot']; ?>" data-src-wide="<?php echo $this->_var['template']['template']; ?>" border="0" id="<?php echo $this->_var['template']['code']; ?>" class="pic"/><?php endif; ?>
                                    </div>
                                    <div class="info">
                                        <p><a href="<?php echo $this->_var['template']['template']; ?>" class="nyroModal">查看大图</a></p>
                                        <p class="mt5">
                                            <a href="../merchants_store.php?merchant_id=<?php echo $this->_var['ru_id']; ?>&tem=<?php echo $this->_var['template']['code']; ?>" class="ml10" target="_blank" >预览模板</a>
                                            <a href="visual_editing.php?act=template_information&tem=<?php echo $this->_var['template']['code']; ?>&merchant_id=<?php echo $this->_var['ru_id']; ?>" class="ml10">编辑模板信息</a>
                                            <a href="javascript:removeTemplate('<?php echo $this->_var['template']['code']; ?>','<?php echo $this->_var['ru_id']; ?>')" class="ml10">删除模板</a>
                                        </p>
                                    </div>
									<?php if ($this->_var['default_tem'] == $this->_var['template']['code']): ?>
                                    <i class="ing"></i>
									<?php endif; ?>
                                </li>								
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 	<?php echo $this->fetch('library/pagefooter.lbi'); ?>
    <script type="text/javascript">
		// 点击查看图片
		$(function(){
			$(".nyroModal").nyroModal();
		});
    </script>	
	<script language="JavaScript">
	<!--
	
	function removeTemplate(code,ru_id){
		if(code){
			if(confirm("确定删除该模板吗？删除后将无法找回！！请谨慎操作！！")){
				Ajax.call('visual_editing.php', "act=removeTemplate&code=" + code + "&ru_id=" + ru_id, removeTemplateResponse, 'POST', 'JSON');
			}
		}else{
			alert('请选择删除的模板');
		}
	}
	
	function removeTemplateResponse(data){
		if(data.error == 0){
			location.href = data.url;
		}else{
			alert(data.content);
		}
	}
	
	//查看模板演示大图
	function maxImg(){
		var carrousel = $(".carrousel");
		var width = $(window).width();
		var height = $(window).height();
		
		$(".portrait").click(function(e){
			var parent = $(this).parents('.templates_content');
			var src = parent.find(".pic").attr("data-src-wide");
			carrousel.find("img").attr("src",src);
			carrousel.fadeIn(200);
		});
		
		carrousel.find(".carr_close").click(function(e){
			carrousel.find("img").attr("src",'');
			carrousel.fadeOut(200);
		});
		
		$(".carrousel .wrapper").css({'width':(width*0.6),'height':(height*0.8)});
	}
	maxImg();
	//-->
	
	</script>
</body>
</html>
