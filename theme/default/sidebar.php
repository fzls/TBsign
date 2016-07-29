<?php if (!defined ('SYSTEM_ROOT')) exit (); ?>
<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://gravatar.iwch.me/avatar/<?php echo md5 (strtolower ($userinfo['email'])); ?>?s=200" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <?php echo $userinfo['name']; ?> </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    
      <ul class="sidebar-menu">
        <li class="header">菜单</li>
        <li class="treeview <?php if (@$_GET['mod'] == 'index') echo 'active'; ?>">
            <a href="./index.php">
                <i class="fa fa-home"></i> <span> 首页</span>
            </a>
        </li>
        <li class="treeview <?php if (@$_GET['mod'] == 'baiduid') echo 'active'; ?>">
            <a href="./index.php?mod=baiduid">
                <i class="fa fa-link"></i> <span> 账号管理</span>
            </a>
        </li>
        
        <?php 
            if ($userinfo['gid'] == 1) {
                ?>
                    <li class="header">管理员设置</li>
                    <li class="treeview <?php if ($_GET['mod'] == 'admin-set') echo 'active'; ?>">
                        <a href="./index.php?mod=admin-set">
                            <i class="fa fa-wrench"></i> <span> 站点管理</span>
                        </a>
                    </li>
                    <li class="treeview <?php if ($_GET['mod'] == 'admin-user') echo 'active'; ?>">
                        <a href="./index.php?mod=admin-user">
                            <i class="fa fa-users"></i> <span> 用户管理</span>
                        </a>
                    </li>
                    <li class="treeview <?php if ($_GET['mod'] == 'admin-plugins') echo 'active'; ?>">
                        <a href="./index.php?mod=admin-plugins">
                            <i class="fa fa-server"></i> <span> 插件管理</span>
                        </a>
                    </li>
                    <li class="treeview <?php if ($_GET['mod'] == 'admin-theme') echo 'active'; ?>">
                        <a href="./index.php?mod=admin-theme">
                            <i class="fa fa-cogs"></i> <span> 主题管理</span>
                        </a>
                    </li>
                <?
            }
        ?>
      </ul>
    </section>
  </aside>