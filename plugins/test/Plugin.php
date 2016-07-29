<?php
	/*
	-----BEGIN INFO-----
	@Class testabcd
	@PluginName 一个测试插件
	@PluginURL http://www.baidu.com
	@Description 用于测试
	@Author U2FsdGVkX1
	@AuthorEmail U2FsdGVkX1@gmail.com
	@For 1.0
	@Version 1.1
	-----END INFO-----
	*/

	class testabcd {
		public function activate () {
			file_put_contents('./1.txt', '启用');
		}

		public function deactivate () {
			file_put_contents('./1.txt', '禁用');
		}
	}
?>