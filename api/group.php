<?php if (!defined ('SYSTEM_ROOT')) exit (); ?>
<?php
    function group_add ($name) // 添加用户组
    {
        $data = array (
        	'gid' => NULL,
        	'name' => $name
        );
        $ret = $GLOBALS['db']->insert ('groups', $data);
        
        return $ret;
    }
    
    function group_delete ($gid) // 删除用户组
    {
        $where = array (
			'gid' => $gid
		);
		$GLOBALS['db']->delete ('groups', $where);
    }
    
    function group_getinfo ($gid) // 获取用户组信息
    {
        // 初始化变量
        $gid = $gid == 0 ? '%' : $gid;
        
        // 查询
        $where = array (
        	'gid[~]' => $gid
        );
		$ret = $GLOBALS['db']->select ('groups', '*', $where);

        return (count ($ret) == 0 ? '' : $ret);
    }
?>