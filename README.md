# 项目简介
项目演示地址：http://exdoc.huxinchun.com
该项目为Exdoc文档系统API服务端，采用Codeigniter3.0+Codeigniter-restserver开发，Codeigniter-restserver是为CodeIgniter提供一个完全RESTful的服务器实现。


项目地址https://github.com/chriskacerguis/codeigniter-restserver
## 项目部署
1.环境php5.4+
## 安装说明
安装步骤ci框架基本类似
``` bash
1.克隆到本地/或下载下载项目
git clone https://github.com/HXCblog/Exdoc-Api.git
```
2.修改/application/config/config.php 网站路径
3.修改/application/config/database.php 数据库连接信息
4.新建数据库exdoc或者其他名称，导入exdoc.spl数据表
5.服务器配置

如果安装过程还有什么疑问可以参考，ci框架安装流程：https://codeigniter.org.cn/user_guide/installation/index.html

## 补充说明
1.ci框架默认路径中带有index.php ，如果你使用了apache服务器，并且启用了 mod_rewrite ，你可以简单的通过一个 .htaccess 文件再加上一些简单的规则就可以移除 index.php 了。
 .htaccess 文件重写规则如下
``` bash
RewriteEngine On  
RewriteCond %{REQUEST_FILENAME} !-f  
RewriteCond %{REQUEST_FILENAME} !-d  
RewriteRule ^(.*)$ index.php/$1 [L]
```
ci官方参考手册：https://codeigniter.org.cn/user_guide/general/urls.html
