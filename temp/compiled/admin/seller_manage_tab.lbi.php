<div class="tabs_info">
    <ul>
        <li <?php if ($this->_var['menu_select']['current'] == 'seller_shopinfo'): ?>class="curr"<?php endif; ?>>
            <a href="merchants_users_list.php?act=seller_shopinfo&id=<?php echo $this->_var['users']['user_id']; ?>">店铺信息</a>
        </li>
        <li <?php if ($this->_var['menu_select']['current'] == 'templates'): ?>class="curr"<?php endif; ?>>
            <a href="visual_editing.php?act=templates&id=<?php echo $this->_var['users']['user_id']; ?>">模板管理</a>
        </li>
		<?php if ($this->_var['users']['merchants_audit'] == 1): ?>
        <li <?php if ($this->_var['menu_select']['current'] == 'allot'): ?>class="curr"<?php endif; ?>>
            <a href="merchants_users_list.php?act=allot&id=<?php echo $this->_var['users']['user_id']; ?>&login_name=<?php echo $this->_var['users']['hopeLoginName']; ?>">店铺权限</a>
        </li>
		<?php endif; ?>
    </ul>
</div>	