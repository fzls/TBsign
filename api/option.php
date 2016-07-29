<?php if (!defined ('SYSTEM_ROOT')) exit (); ?>
<?php
    function option_add ($name, $value) // 添加一项设置
    {
        $data = array (
        	'name' => $name,
        	'value' => $value,
        	'uid' => 0
        );
        $GLOBALS['db']->insert ('options', $data);
    }
    
    function option_update ($name, $newvalue) // 更新一项设置
    {
        $data = array (
        	'value' => $newvalue
        );
        $where = array (
        	'name' => $name
        );
        $GLOBALS['db']->update ('options', $data, $where);
    }

    function option_delete ($name) //  删除一项设置
    {
        $where = array (
        	'name' => $name
        );
		$GLOBALS['db']->delete ('options', $where);
    }
    
    function option_getvalue ($name) // 获取一项设置信息
    {
        $where = array (
        	'name' => $name,
        	'LIMIT' => 1
        );
		$ret = $GLOBALS['db']->select ('options', 'value', $where);
        
        return $ret[0];
    }
?>