<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>
<body class="iframe_body">
	<div class="warpper">
    	<div class="title">设置 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
            <div class="tabs_info">
            	<ul>
                    <?php if ($this->_var['act_type'] != 'complaint_conf'): ?>
                    <li <?php if ($this->_var['act_type'] == 'report_conf'): ?>class="curr"<?php endif; ?>><a href="<?php echo $this->_var['action_link3']['href']; ?>"><?php echo $this->_var['action_link3']['text']; ?></a></li>
                    <?php else: ?>
                    <li <?php if ($this->_var['act_type'] == 'complaint_conf'): ?>class="curr"<?php endif; ?>><a href="<?php echo $this->_var['action_link2']['href']; ?>"><?php echo $this->_var['action_link2']['text']; ?></a></li>
                    <?php endif; ?>
                    <li <?php if ($this->_var['act_type'] == 'list'): ?>class="curr"<?php endif; ?>><a href="<?php echo $this->_var['action_link']['href']; ?>"><?php echo $this->_var['action_link']['text']; ?></a></li>
                    <?php if ($this->_var['act_type'] != 'complaint_conf'): ?>
                    <li <?php if ($this->_var['act_type'] == 'type'): ?>class="curr"<?php endif; ?>><a href="<?php echo $this->_var['action_link1']['href']; ?>"><?php echo $this->_var['action_link1']['text']; ?></a></li>
                    <li <?php if ($this->_var['act_type'] == 'title'): ?>class="curr"<?php endif; ?>><a href="<?php echo $this->_var['action_link2']['href']; ?>"><?php echo $this->_var['action_link2']['text']; ?></a></li>
                    <?php else: ?>
                    <li <?php if ($this->_var['act_type'] == 'title'): ?>class="curr"<?php endif; ?>><a href="<?php echo $this->_var['action_link1']['href']; ?>"><?php echo $this->_var['action_link1']['text']; ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>
            
            <div class="flexilist">
                <div class="mian-info">
                    <form enctype="multipart/form-data" name="theForm" action="shop_config.php?act=post" method="post" id="shopConfigForm">
                        <div class="switch_info">
                            <?php $_from = $this->_var['report_conf']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'var');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['var']):
?>
                                <?php echo $this->fetch('library/shop_config_form.lbi'); ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            <div class="item">
                                <div class="label">&nbsp;</div>
                                <div class="label_value info_btn">
									<input name="type" type="hidden" value="<?php if ($this->_var['conf_type']): ?><?php echo $this->_var['conf_type']; ?><?php else: ?>report_conf<?php endif; ?>">
                                    <input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" ectype="btnSubmit" class="button" >	
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>	
		</div>
	</div>

	<?php echo $this->fetch('library/pagefooter.lbi'); ?>
    
    <?php echo $this->smarty_insert_scripts(array('files'=>'jquery.purebox.js')); ?>
    
    
	<script type="text/javascript">
	
	</script>
    
</body>
</html>
