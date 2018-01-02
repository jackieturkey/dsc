<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title">系统设置 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="explanation" id="explanation">
            	<div class="ex_tit">
					<i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span>
                    <?php if ($this->_var['open'] == 1): ?>
                    <div class="view-case">
                    	<div class="view-case-tit"><i></i>查看教程</div>
                        <div class="view-case-info">
                        	<a href="http://help.ecmoban.com/article-6901.html" target="_blank">商城文件权限检测说明</a>
                        </div>
                    </div>			
                    <?php endif; ?>	
				</div>
                <ul>
                	<li>自动检测文件权限功能。</li>
                    <li>若服务器未给相应读写编辑权限，则会以打叉形式展示。</li>
                </ul>
            </div>
            <div class="flexilist">
                <div class="common-content">
                	<div class="list-div" id="listDiv">
                    	<table cellpadding="0" cellspacing="0" border="0">
                        	<thead>
                            	<tr>
                                    <th width="55%"><div class="tDiv"><?php echo $this->_var['lang']['item']; ?></div></th>
                                    <th width="15%"><div class="tDiv"><?php echo $this->_var['lang']['read']; ?></div></th>
                                    <th width="15%"><div class="tDiv"><?php echo $this->_var['lang']['write']; ?></div></th>
                                    <th width="15%"><div class="tDiv"><?php echo $this->_var['lang']['modify']; ?></div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
                            	<tr>
                                    <td><div class="tDiv"><?php echo $this->_var['item']['item']; ?></div></td>
                                    <td><div class="tDiv"><?php if ($this->_var['item']['r'] > 0): ?><img src="images/yes.png" width="14" height="14" alt="YES" /><?php else: ?><img src="images/no.gif" width="14" height="14" alt="NO" /><?php if ($this->_var['item']['err_msg']['w']): ?>&nbsp;<a href="javascript:showNotice('r_<?php echo $this->_var['key']; ?>');" title="<?php echo $this->_var['lang']['detail']; ?>">[<?php echo $this->_var['lang']['detail']; ?>]</a><br /><span class="notice-span" <?php if ($this->_var['help_open']): ?>style="display:block" <?php else: ?> style="display:none" <?php endif; ?> id="r_<?php echo $this->_var['key']; ?>"><?php $_from = $this->_var['item']['err_msg']['r']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'msg');if (count($_from)):
    foreach ($_from AS $this->_var['msg']):
?><?php echo $this->_var['msg']; ?><?php echo $this->_var['lang']['unread']; ?><br /><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></span><?php endif; ?><?php endif; ?></div></td>
                                    <td><div class="tDiv"><?php if ($this->_var['item']['w'] > 0): ?><img src="images/yes.png" width="14" height="14" alt="YES" /><?php else: ?><img src="images/no.gif" width="14" height="14" alt="NO" /><?php if ($this->_var['item']['err_msg']['w']): ?>&nbsp;<a href="javascript:showNotice('w_<?php echo $this->_var['key']; ?>');" title="<?php echo $this->_var['lang']['detail']; ?>">[<?php echo $this->_var['lang']['detail']; ?>]</a><br /><span class="notice-span" <?php if ($this->_var['help_open']): ?>style="display:block" <?php else: ?> style="display:none" <?php endif; ?> id="w_<?php echo $this->_var['key']; ?>"><?php $_from = $this->_var['item']['err_msg']['w']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'msg');if (count($_from)):
    foreach ($_from AS $this->_var['msg']):
?><?php echo $this->_var['msg']; ?><?php echo $this->_var['lang']['unwrite']; ?><br /><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></span><?php endif; ?><?php endif; ?></div></td>
                                    <td><div class="tDiv"><?php if ($this->_var['item']['m'] > 0): ?><img src="images/yes.png" width="14" height="14" alt="YES" /><?php else: ?><img src="images/no.gif" width="14" height="14" alt="NO" /><?php if ($this->_var['item']['err_msg']['m']): ?>&nbsp;<a href="javascript:showNotice('m_<?php echo $this->_var['key']; ?>');" title="<?php echo $this->_var['lang']['detail']; ?>">[<?php echo $this->_var['lang']['detail']; ?>]</a><br /><span class="notice-span" <?php if ($this->_var['help_open']): ?>style="display:block" <?php else: ?> style="display:none" <?php endif; ?> id="m_<?php echo $this->_var['key']; ?>"><?php $_from = $this->_var['item']['err_msg']['m']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'msg');if (count($_from)):
    foreach ($_from AS $this->_var['msg']):
?><?php echo $this->_var['msg']; ?><?php echo $this->_var['lang']['unmodify']; ?><br /><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></span><?php endif; ?><?php endif; ?></div></td>
                                </tr>
                                <?php endforeach; else: ?>
                                    <tr><td class="no-records" colspan="12"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
                                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $this->fetch('library/pagefooter.lbi'); ?>
</body>
</html>
