<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
    <div class="warpper">
        <div class="title"><a href="<?php echo $this->_var['action_link']['href']; ?>" class="s-back"></a>模板 - 首页可视化管理</div>
        <div class="content">
            <div class="explanation" id="explanation">
                <div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
                <ul>
                    <li>展示所有首页模板。</li>
                    <li>可进行首页模板信息，内容等编辑</li>
                    <li>每套模板有对应的首页模板</li>
                    <li>导出时需选中对应的选中按钮</li>
                    <li>该功能暂时只支持ecmoban_dsc2017，ecmoban_dsc后期开发中，敬请期待</li>
                </ul>
            </div>
            <div class="flexilist">
                <div class="common-head">
                    <div class="fl">
                        <a href="javascript:void(0);" ectype='information' data-code=""><div class="fbutton"><div class="add" title="添加新模板"><span><i class="icon icon-plus"></i>添加新模板</span></div></div></a>
                        <a href="javascript:void(0);" ectype="export"><div class="fbutton"><div class="add" title="导出"><span><i class="icon icon-download-alt"></i>导出</span></div></div></a>
                    </div>
                </div>
                <div class="common-content">
                    <div class="common-content">
                        <div class="mian-info">
                            <form method="post" action="visualhome.php?act=export_tem" name="listForm" id="exportForm">
                                <div class="template-list template-ksh-list mt10" ectype='templateList'>
                                    <ul>
                                        <?php $_from = $this->_var['available_templates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'template');$this->_foreach['template'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['template']['total'] > 0):
    foreach ($_from AS $this->_var['template']):
        $this->_foreach['template']['iteration']++;
?>
                                        <li <?php if ($this->_var['default_tem'] == $this->_var['template']['code']): ?>class="curr"<?php endif; ?>>
                                            <div class="checkbox_item">
                                                <input type="checkbox" name="checkboxes[]" value="<?php echo $this->_var['template']['code']; ?>" class="ui-checkbox" id="checkbox_<?php echo $this->_var['template']['code']; ?>" />
                                                <label for="checkbox_<?php echo $this->_var['template']['code']; ?>" class="ui-label"></label>
                                            </div>
                                            <div class="tit" title="<?php echo $this->_var['template']['name']; ?>"><?php if ($this->_var['template']['name']): ?><?php echo $this->_var['template']['name']; ?><?php else: ?>&nbsp;<?php endif; ?></div>
                                            <div class="span"><?php echo $this->_var['template']['desc']; ?></div>
                                            <div class="img" ectype="setupTemplate" data-code="<?php echo $this->_var['template']['code']; ?>">
                                                <?php if ($this->_var['template']['screenshot']): ?><img width="263" height="338" src="<?php echo $this->_var['template']['screenshot']; ?>" data-src-wide="<?php echo $this->_var['template']['template']; ?>" border="0" id="<?php echo $this->_var['template']['code']; ?>" ectype="pic" class="pic"/><?php endif; ?>
                                                <div class="bg"></div>
                                            </div>
                                            <div class="box" ectype="setupTemplate" data-code="<?php echo $this->_var['template']['code']; ?>">
                                                <i class="icon icon-gou"></i>
                                                <span>使用该模版</span>
                                            </div>
                                            <div class="info">
                                                <p>
                                                	<a href="<?php echo $this->_var['template']['template']; ?>" target="_blank" ectype="see">查看大图</a>
                                                	<a href="visualhome.php?act=visual&code=<?php echo $this->_var['template']['code']; ?>" class="zx" target="_blank">装修</a>
                                                </p>
                                                <p class="mt5">
                                                    <a href="../index.php?suffix=<?php echo $this->_var['template']['code']; ?>" class="ml10" target="_blank" >预览模板</a>
                                                    <a href="javascript:void(0);" ectype='information' data-code="<?php echo $this->_var['template']['code']; ?>" class="ml10">编辑模板信息</a>
                                                    <a href="javascript:removeTemplate('<?php echo $this->_var['template']['code']; ?>')" class="ml10">删除模板</a>
                                                </p>
                                            </div>
                                            <i<?php if ($this->_var['default_tem'] == $this->_var['template']['code']): ?> class="ing"<?php endif; ?> ectype="default"></i>
                                        </li>	
                                        <?php endforeach; else: ?>
                                        <li class="notic">暂无模板</li>
                                        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 	<?php echo $this->fetch('library/pagefooter.lbi'); ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'jquery.purebox.js')); ?>
    
    <script type="text/javascript">
    // 点击查看图片
    $(function(){
        $('.nyroModal').nyroModal();
        resetHref();
    });
	function resetHref(){
		$("*[ectype='see']").each(function(){
			var href = $(this).attr("href");
			$(this).attr("href",href + "?&" + +Math.random());
		});
		$("*[ectype='pic']").each(function(){
			var src = $(this).attr("src");
			$(this).attr("src",src + "?&" + +Math.random());
		});
	}
    function removeTemplate(code){
		if(code){
			if(confirm("确定删除该模板吗？删除后将无法找回！！请谨慎操作！！")){
				Ajax.call('visualhome.php', "act=removeTemplate&code=" + code, removeTemplateResponse, 'POST', 'JSON');
			}
		}else{
			alert('请选择删除的模板');
		}
    }
    
	function removeTemplateResponse(data){
        if(data.error == 0){
            $("[ectype='templateList']").find("ul").html(data.content);
            resetHref();
        }else{
            alert(data.content);
        }
    }
	
	//使用模板
	$(document).on("click","*[ectype='setupTemplate']",function(){
		var code = $(this).data('code');
		var t = $(this);
		if(confirm("启用新的样式将覆盖原来的样式。您确定要启用选定的样式吗？")){
			Ajax.call('visualhome.php', 'act=setupTemplate' + '&code=' + code, function(result){
				if(result.error == 1){
					alert(result.message);
				}else{
					t.parents("[ectype='templateList']").find('[ectype="default"]').removeClass("ing");
					t.parents("li").find('[ectype="default"]').addClass("ing");
					t.parents("li").addClass("curr").siblings().removeClass("curr");
				}
			}, 'POST', 'JSON');
		}
	});
	
	//信息编辑
	$(document).on("click","*[ectype='information']",function(){
		var code = $(this).data('code');
		Ajax.call('dialog.php', 'act=template_information' + '&check=1&action=add&code=' + code, informationResponse, 'POST', 'JSON');
	});
	
	function informationResponse(result){
		var content = result.content;
		pb({
			id: "template_information",
			title: "模板信息",
			width: 945,
			content: content,
			ok_title: "确定",
			drag: true,
			foot: true,
			cl_cBtn: false,
			onOk: function(){
				var fald = true;
				var name = $("#information").find("input[name='name']");
				var ten_file = $("#information").find("input[name='ten_file_textfile']");
				var big_file = $("#information").find("input[name='big_file_textfile']");
				
				if(name.val() == ""){
					error_div("#information input[name='name']","模板名称不能为空");
					fald = false;
				}else if(ten_file.val() == ""){
					error_div("#information input[name='ten_file']","请上传模板封面");
					fald = false;
				}else if(big_file.val() == ""){
					error_div("#information input[name='big_file']","请上传模板大图");
					fald = false;
				}else{
					var actionUrl = "visualhome.php?act=edit_information";  
					$("#information").ajaxSubmit({
						type: "POST",
						dataType: "JSON",
						url: actionUrl,
						data: {"action": "TemporaryImage"},
						success: function (data) {
							if(data.error == 1){
								alert(data.massege);
							}else{
								$("[ectype='templateList']").find("ul").html(data.content);
							}
                            resetHref();
						},
						async: true  
					});
					
					fald = true;
				}
				return fald;
			}
		});
	}
	
	error_div = function(obj,error, is_error){
		var error_div = $(obj).parents('div.value').find('div.form_prompt');
		$(obj).parents('div.value').find(".notic").hide();
		
		if(is_error != 1){
			$(obj).addClass("error");
		}
		
		$(obj).focus();
		error_div.find("label").remove();
		error_div.append("<label class='error'><i class='icon icon-exclamation-sign'></i>"+error+"</label>");
	}
	
	$(document).on("click","*[ectype='export']",function(){
		var checkboxes = '';
		var i = 0;
		$("[ectype='templateList']").find("input[name='checkboxes[]']:checked").each(function(){
			i++;
		})
		if(i > 0){
			$("#exportForm").submit();
		}else{
			alert("请选择导出对象！");
		}
	});
	</script>
</body>
</html>
