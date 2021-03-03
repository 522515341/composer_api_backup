laravel-admin extension
======

### 安装依赖项:

    composer require weigatherbackup/apibackup
     
### 发布资源文件

    php artisan vendor:publish --provider="Encore\ApiBackup\ApiBackupServiceProvider"
    
### 执行数据库迁移文件

    php artisan migrate

### 其他
 <!-- 在 config/wj_ucenter_login_service.php 中设置相关数据  -->
 请在env文件中配置以下三个变量
 BACKUP_APPID、BACKUP_SECRET、BACKUP_HOST

### 目录设置
    详情请看：扩展文件->routes->web.php
    库列表     =>  后台地址/backup/db_list
    库备份列表 =>  后台地址/backup/db_down_list
    表列表     =>  后台地址/backup/tables_list
    表备份列表 =>  后台地址/backup/tables_down_list
 <!-- 目录设置 -->
<div>
    <table border="0">
      <tr>
        <th>Version</th>
        <th>Laravel-Admin Version</th>
      </tr>
      <tr>
        <td>^1.0</td>
        <td>>= 1.6.10</td>
      </tr>
      <tr>
        <td>^2.0</td>
        <td>>= 1.8.1</td>
      </tr>
      <tr>
        <td>^3.0</td>
        <td>all</td>
      </tr>
    </table>
</div> 
