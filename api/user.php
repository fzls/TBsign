<?php if (!defined ('SYSTEM_ROOT')) exit (); ?>
<?php
    function user_register ($name, $email, $password) // 注册账号
    {
        // 判断是否已注册过了
        if (user_search ($email) != -1) { // 邮箱
            return -1;
        } 
        if (user_search ($name) != -1) { // 昵称
            return -2;
        } 
        
        // 插入账号到数据库
        $data = array (
        	'uid' => NULL,
        	'name' => $name,
        	'email' => $email,
        	'password' => md5 (md5 (md5 ($password))),
        	'time' => time (),
        	'gid' => '2',
        	'baiduid' => 'a:0:{}'
        );
        $ret = $GLOBALS['db']->insert ('users', $data);
        
        return $ret;
    }
    
    function user_delete ($uid) //  账号
    {
		$where = array (
			'uid' => $uid
		);
		$GLOBALS['db']->delete ('users', $where);
    }
    
    function user_login ($uid, $password) // 登录账号
    {
        // 验证信息
        $userinfo = user_getinfo ($uid);
        if (md5 (md5 (md5 ($password))) != $userinfo[0]['password']) { // 判断帐号密码是否正确
            return -1;
        }
        
        // 登录
        $uss = md5 ($userinfo[0]['uid'] . $userinfo[0]['password'] . time () . rand ());
        if (!empty ($logininfo = user_getlogininfo ($uid))) { // 判断是否已经登录过了，是的话删除
            user_logout ($logininfo[0]['uss']);
        }
        
        $data = array (
            'uid' => $uid,
        	'uss' => $uss,
        	'time' => time (),
        	'ip' => $_SERVER['REMOTE_ADDR']
        );
        $GLOBALS['db']->insert ('online', $data);

        return $uss;
    }
    
    function user_logout ($uss) // 登出
    {
        $where = array (
        	'uss' => $uss
        );
		$GLOBALS['db']->delete ('online', $where);
    }
    
    function user_search ($user) // 搜索帐号
    {
        $where = array (
        	'OR' => array (
        		'email' => $user,
        		'name' => $user
        	),
        	'LIMIT' => 1
        );
		$ret = $GLOBALS['db']->select ('users', 'uid', $where);
        
        return (count ($ret) == 0 ? -1 : $ret[0]);
    }
    
    function user_getinfo ($uid) // 获取帐号信息
    {
        // 初始化变量
        $uid = $uid == 0 ? '%' : $uid;
        
        // 查询
        $where = array (
        	'uid[~]' => $uid
        );
		$ret = $GLOBALS['db']->select ('users', '*', $where);

        return (count ($ret) == 0 ? '' : $ret);
    }
    
    function user_loginsearch ($uss) // 搜索登录帐号
    {
        $where = array (
        	'uss' => $uss,
        	'LIMIT' => 1
        );
		$ret = $GLOBALS['db']->select ('online', 'uid', $where);
        
        return (count ($ret) == 0 ? -1 : $ret[0]);
    }
    
    function user_getlogininfo ($uid) // 获取帐号登录信息
    {
        // 初始化变量
        $uid = $uid == 0 ? '%' : $uid;
        
        // 查询
        $where = array (
        	'uid[~]' => $uid
        );
		$ret = $GLOBALS['db']->select ('online', '*', $where);

        return (count ($ret) == 0 ? '' : $ret);
    }
    
    function user_setgroup ($uid, $gid) // 设置某账号的用户组
    {
        $data = array (
        	'gid' => $gid
        );
        $where = array (
        	'uid' => $uid
        );
        $GLOBALS['db']->update ('users', $data, $where);
    }

    function user_setpassword ($uid, $password) // 设置某账号的密码
    {
        $data = array (
        	'password' => md5 (md5 (md5 ($password)))
        );
        $where = array (
        	'uid' => $uid
        );
        $GLOBALS['db']->update ('users', $data, $where);
    }

    function user_setemail ($uid, $email) // 设置某账号的邮箱
    {
        $data = array (
        	'email' => $email
        );
        $where = array (
        	'uid' => $uid
        );
        $GLOBALS['db']->update ('users', $data, $where);
    }
?>