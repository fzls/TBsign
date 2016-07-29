<?php if (!defined ('SYSTEM_ROOT')) exit (); ?>
<?php
    function baiduid_add ($uid, $bduss) // 添加一条bduss
    {
        // 判断是否已存在
        $pbduss = baiduid_getinfo ($uid);
        if (baiduid_search ($uid, $bduss) != -1) {
    		return -1;
    	}

        // 添加bduss
        $pbduss[] = array ('bduss' => $bduss);
        
        // 更新bduss
        baiduid_setbduss ($uid, $pbduss);
    }
    
    function baiduid_delete ($uid, $bduss) // 删除一条bduss
    {
        // 判断是否存在
        $pbduss = baiduid_getinfo ($uid);
        if (baiduid_search ($uid, $bduss) == -1) {
    		return -1;
    	}
        
        // 删除bduss
        unset ($pbduss[baiduid_search ($uid, $bduss)]);
        
        // 更新bduss
        baiduid_setbduss ($uid, $pbduss);
    }
    
    function baiduid_getinfo ($uid) // 获取某用户的bduss
    {
        $where = array (
        	'uid' => $uid
        );
		$ret = $GLOBALS['db']->select ('users', 'baiduid', $where);

        return unserialize ($ret[0]);
    }

    function baiduid_search ($uid, $bduss) { // 从bduss获取bid
        $baiduidlist = baiduid_getinfo ($uid);
        foreach ($baiduidlist as $i => $baiduidlist_d) {
            if ($baiduidlist_d['bduss'] == $bduss) {
                return $i;
            }
        }

        return -1;
    }

    function baiduid_setbduss ($uid, $bduss) // 手动设置bduss
    {
		$data = array (
        	'baiduid' => serialize ($bduss)
        );
        $where = array (
        	'uid' => $uid
        );
        $GLOBALS['db']->update ('users', $data, $where);
    }
?>