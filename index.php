<?php
    // 检查是否已安装
    if (!is_file ('./config.php')) {
        header ('Location: install/index.php');
        exit ();
    }
    
    // 加载配置
    require_once 'init.php';

    // 执行各类操作
    $mod = $_GET['mod']; // 获取类型
    switch ($mod) {
        case 'index': // 首页
            // 检查
            if (!isset ($userinfo)) {
                header ('Location: ./index.php?mod=login');
                exit ();
            }
            
            // 加载页面
            require_once ($siteinfo['theme']['path'] . '/index.php');
            
            // 跳出
            break;
        case 'login': // 登录页
            // 加载页面
            require_once ($siteinfo['theme']['path'] . '/login.php');
            
            // 跳出
            break;
        case 'reg': // 注册页
            // 加载页面
            require_once ($siteinfo['theme']['path'] . '/reg.php');
            
            // 跳出
            break;
        case 'admin-user': // 用户管理页
            // 检查
            if (!isset ($userinfo)) {
                header ('Location: ./index.php?mod=login');
                exit ();
            }
            if ($userinfo['gid'] != 1) {
            	header ('Location: ./index.php?mod=login');
                exit ();
            }

            // 加载页面
            require_once ($siteinfo['theme']['path'] . '/admin-user.php');
            
            // 跳出
            break;
        case 'profile': // 用户页
            // 检查
            if (!isset ($userinfo)) {
                header ('Location: ./index.php?mod=login');
                exit ();
            }

            // 加载页面
            require_once ($siteinfo['theme']['path'] . '/profile.php');
            
            // 跳出
            break;
        case 'baiduid': // 用户页
            // 检查
            if (!isset ($userinfo)) {
                header ('Location: ./index.php?mod=login');
                exit ();
            }

            // 加载页面
            require_once ($siteinfo['theme']['path'] . '/baiduid.php');
            
            // 跳出
            break;
        case 'admin-set': // 站点管理页
            // 检查
            if (!isset ($userinfo)) {
                header ('Location: ./index.php?mod=login');
                exit ();
            }
            if ($userinfo['gid'] != 1) {
            	header ('Location: ./index.php?mod=login');
                exit ();
            }

            // 加载页面
            require_once ($siteinfo['theme']['path'] . '/admin-set.php');
            
            // 跳出
            break;
        case 'admin-plugins': // 插件管理页
        	// 检查
            if (!isset ($userinfo)) {
                header ('Location: ./index.php?mod=login');
                exit ();
            }
            if ($userinfo['gid'] != 1) {
            	header ('Location: ./index.php?mod=login');
                exit ();
            }

            // 加载页面
            require_once ($siteinfo['theme']['path'] . '/admin-plugins.php');
            
            // 跳出
            break;
        case 'admin-theme': // 插件管理页
            // 检查
            if (!isset ($userinfo)) {
                header ('Location: ./index.php?mod=login');
                exit ();
            }
            if ($userinfo['gid'] != 1) {
            	header ('Location: ./index.php?mod=login');
                exit ();
            }

            // 加载页面
            require_once ($siteinfo['theme']['path'] . '/admin-theme.php');
            
            // 跳出
            break;
            
        case 'admin-cron': // 计划任务页
            // 检查
            if (!isset ($userinfo)) {
                header ('Location: ./index.php?mod=login');
                exit ();
            }
            if ($userinfo['gid'] != 1) {
            	header ('Location: ./index.php?mod=login');
                exit ();
            }

            // 加载页面
            require_once ($siteinfo['theme']['path'] . '/admin-cron.php');
            
            // 跳出
            break;
    }
?>