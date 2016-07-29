<?php if (!defined ('SYSTEM_ROOT')) exit (); ?>
<?php
    function tieba_getsign ($data) { // 签名数据
		// 初始化变量
		$ret = '';
		
		// 合并数组
		foreach ($data as $k => $data_d) {
		    $ret .= $k . '=' . $data_d . '&';
		}
		
		// 签名
		$ret .= 'sign=' . md5 (str_replace ('&', '', $ret) . 'tiebaclient!!!');
		
		// 返回
		return $ret;
	}
	
	function tieba_login ($user, $password, $vcode = '', $vcode_md5 = '') // 登录
	{
	    $url = API_URL . '/index.php?mod=login';
	    $data = array (
	        'skey' => auth_getskey (),
	        'user' => $user,
	        'password' => $password
	    );
	    if (!empty ($vcode)) {
	    	$data['vcode'] = $vcode;
	    }
	    if (!empty ($vcode_md5)) {
	    	$data['vcode_md5'] = $vcode_md5;
	    }

	    return system_fetch ($url, $data);
	}
?>