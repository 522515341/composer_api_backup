<?php
class Sdk
{
    //本地
    // const APP_ID = 'BACK9bfcd0c7b2fc1';
    // const APP_SECRET = 'bfb59b60f2a5673a5638742c2b184488';
    // const API_HOST = 'http://back.cn';
    //测试服
    // const APP_ID = 'BACK9bfcd0c7b2fc1';
    // const APP_SECRET = 'bfb59b60f2a5673a5638742c2b184488';
    // const API_HOST = 'http://backups.test.meetlan.com';
    // //正式服
    // const APP_ID = 'BACKad72d93bee849';
    // const APP_SECRET = '7dce7097115afbba4d25735d7ceed5cf';
    // const API_HOST = 'http://backup.service.weigather.com';

    protected $APP_ID = '';
    protected $APP_SECRET = '';
    protected $API_HOST = '';
    public function __construct()
    {
        $this->APP_ID = env('BACKUP_APPID','');
        $this->APP_SECRET = env('BACKUP_SECRET','');
        $this->API_HOST = env('BACKUP_HOST','');
    }
    /**
     * @name    获取数据表配置列表
     * @url     /api/backup/db_list
     * POST 请求
     * @desc    频繁请求区间：大于5秒
     * @param  $param 参数说明
     *             --- page [int] 必填 获取页数
     *             --- back_id  [int] 选填  db_list接口的ID
     *             --- title  [string] 选填  标识
     *             --- host  [string] 选填  数据库地址
     *             --- database  [string] 选填  数据库名称
     * 数据返回 请看文档
    */
    public function db_list($data=[])
    {

        if(empty($data)){
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode(['page'=>1]),
            ];
        }else{
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode($data),
            ];
        }

        $data = self::sign($data);
        $url = $this->API_HOST.'/api/backup/db_list';
        $res = $this->post($url,$data);
        return $res;
    }

    /**
     * @name    添加数据库配置
     * @url     /api/backup/db_add
     * POST 请求
     * @desc    频繁请求区间：大于5秒
     * @param  $param 参数说明
     *             --- title  [string] 必填  标识
     *             --- nickname  [string] 必填  昵称
     *             --- connection  [string] 选填  当前只支持mysql,数据库类型(mysql,sqlite,pgsql,sqlsrv)
     *             --- host  [string] 必填  数据库地址
     *             --- port  [string] 必填  端口
     *             --- username  [string] 必填  账号
     *             --- psw  [string] 必填  密码,无密码请传 ''
     *             --- database  [string] 必填  数据库名称
     *             --- prefix  [string] 选填  表前缀
     *             --- setting  [array] 必填  定时备份时间设置,数组，参数如下
     * @param      $param['setting'] 参数说明,如果不明白，请参考 请按照 linux系统上的 crontab 进行设置！！！ 进行定时任务配置
     *                        --- execute_I  [string] 必填  分备份
     *                        --- execute_H  [string] 必填  时备份
     *                        --- execute_D  [string] 必填  天备份
     *                        --- execute_M  [string] 必填  月备份
     *                        --- execute_W  [string] 必填  周备份
     *                        --- del_I  [string] 必填  分删除
     *                        --- del_H  [string] 必填  时删除
     *                        --- del_D  [string] 必填  天删除
     *                        --- del_M  [string] 必填  月删除
     *                        --- del_W  [string] 必填  周删除
     *                        --- execute_del  [string] 必填  删除几天前的备份[1_day、3_day、1_week、3_week、1_month、1_quarter、1_half、1_year]
     * 数据返回 请看文档
    */
    public function db_add($data=[])
    {
        if(empty($data)){
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode(['参数','参数','...','setting'=>['参数','参数','...']]),
            ];
        }else{
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode($data),
            ];
        }

        $data = self::sign($data);
        $url = $this->API_HOST.'/api/backup/db_add';
        $res = $this->post($url,$data);
        return $res;
    }

    /**
     * @name    修改数据库配置
     * @url     /api/backup/db_edit
     * POST 请求
     * @desc    频繁请求区间：大于5秒
     * @param  $param 参数说明
     *              以下是查询条件
     *              --- s_back_id  [int] 选填  db_list接口的ID，传了该参数，下方三个可不用传
     *              --- s_title  [string] 选填  标识，title、host、database 参数一起使用
     *              --- s_host  [string] 选填  数据库地址，title、host、database 参数一起使用
     *              --- s_database  [string] 选填  数据库名称，title、host、database 参数一起使用
     *
     *
     *              以下是修改参数
     *              --- nickname  [string] 选填  昵称
     *              --- connection  [string] 选填  当前只支持mysql,数据库类型(mysql,sqlite,pgsql,sqlsrv)
     *              --- host  [string] 选填  数据库地址
     *              --- port  [string] 选填  端口
     *              --- username  [string] 选填  账号
     *              --- psw  [string] 选填  密码
     *              --- database  [string] 选填  数据库名称
     *              --- prefix  [string] 选填  表前缀
     *              --- setting  [array] 选填  定时备份时间设置,数组，参数如下
     * @param           $param['setting'] 参数说明,如果不明白，请参考 请按照 linux系统上的 crontab 进行设置！！！ 进行定时任务配置
     *                        --- execute_I  [string] 必填  分备份
     *                        --- execute_H  [string] 必填  时备份
     *                        --- execute_D  [string] 必填  天备份
     *                        --- execute_M  [string] 必填  月备份
     *                        --- execute_W  [string] 必填  周备份
     *                        --- del_I  [string] 必填  分删除
     *                        --- del_H  [string] 必填  时删除
     *                        --- del_D  [string] 必填  天删除
     *                        --- del_M  [string] 必填  月删除
     *                        --- del_W  [string] 必填  周删除
     *                        --- execute_del  [string] 必填  删除几天前的备份[1_day、3_day、1_week、3_week、1_month、1_quarter、1_half、1_year]
     * 数据返回 请看文档
    */
    public function db_edit($data=[])
    {
        if(empty($data)){
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode(['s_back_id'=>'ID','参数','参数','...','setting'=>['参数','参数','...']]),
            ];
        }else{
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode($data),
            ];
        }
        $data = self::sign($data);
        $url = $this->API_HOST.'/api/backup/db_edit';
        $res = $this->post($url,$data);
        return $res;
    }

    /**
     * @name    数据库备份列表
     * @url     /api/backup/db_down_list
     * POST 请求
     * @desc    频繁请求区间：大于5秒
     * @param  $param 参数说明
     *             --- page [int] 必填 获取页数
     *             --- back_id  [int] 选填  db_list接口的ID
     *             --- title  [string] 选填  标识，title、host、database 参数一起使用
     *             --- host  [string] 选填  数据库地址，title、host、database 参数一起使用
     *             --- database  [string] 选填  数据库名称，title、host、database 参数一起使用
     *             --- start_time  [int] 选填  创建时间(开始)，时间戳
     *             --- end_time  [int] 选填  创建时间(结束)，时间戳
     * 数据返回 请看文档
    */
    public function db_down_list($data=[])
    {
        if(empty($data)){
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode(['page'=>'1']),
            ];
        }else{
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode($data),
            ];
        }
        $data = self::sign($data);
        $url = $this->API_HOST.'/api/backup/db_down_list';
        $res = $this->post($url,$data);
        return $res;
    }

    /**
     * @name    获取数据表配置列表
     * @url     /api/backup/tables_list
     * POST 请求
     * @desc    频繁请求区间：大于5秒
     * @param  $param 参数说明
     *             --- page [int] 必填 获取页数
     *             --- back_id  [int] 选填  db_list接口的ID
     *             --- table_id  [int] 选填  tables_list接口的ID
     *             --- back_type  [string] 选填  类型[tables_backup:自定表备份、adds_backup:增量表备份、structure_backup:表姐空备份]
     * 数据返回 请看文档
    */
    public function tables_list($data=[])
    {
        if(empty($data)){
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode(['page'=>'1']),
            ];
        }else{
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode($data),
            ];
        }
        $data = self::sign($data);
        $url = $this->API_HOST.'/api/backup/tables_list';
        $res = $this->post($url,$data);
        return $res;
    }

    /**
     * @name    添加数据表配置
     * @url     /api/backup/tables_add
     * POST 请求
     * @desc    频繁请求区间：大于5秒
     * @param  $param 参数说明
     *             --- back_id  [int] 必填  db_list接口的ID
     *             --- title  [string] 必填  标题
     *             --- back_type  [string] 必填  备份类型：[tables_backup:自定表备份、adds_backup:增量表备份、structure_backup:表姐空备份]
     * @param      特殊说明！！！！！！
     * @param      选择adds_backup:增量表备份时，系统会自动去获取数据表的主键和自增字段，若无滋主键和自增字段，该表将不会进行备份，可通过tables_list接口查看详情
     *             --- type  [string] 必填  类型：1统一合并备份 、各自独立备份
     *             --- tables  [array] 必填  需要备份的表，数组格式 ["表1","表2"]
     *             --- setting  [array] 必填  定时备份时间设置,数组，参数如下
     * @param           $param['setting'] 参数说明,如果不明白，请参考 请按照 linux系统上的 crontab 进行设置！！！ 进行定时任务配置
     *                        --- execute_I  [string] 必填  分备份
     *                        --- execute_H  [string] 必填  时备份
     *                        --- execute_D  [string] 必填  天备份
     *                        --- execute_M  [string] 必填  月备份
     *                        --- execute_W  [string] 必填  周备份
     *                        --- del_I  [string] 必填  分删除
     *                        --- del_H  [string] 必填  时删除
     *                        --- del_D  [string] 必填  天删除
     *                        --- del_M  [string] 必填  月删除
     *                        --- del_W  [string] 必填  周删除
     *                        --- execute_del  [string] 必填  删除几天前的备份[1_day、3_day、1_week、3_week、1_month、1_quarter、1_half、1_year]
     * 数据返回 请看文档
    */
    public function tables_add($data=[])
    {
        if(empty($data)){
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode(['参数','参数','参数','...','setting'=>['参数','参数','...']]),
            ];
        }else{
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode($data),
            ];
        }
        $data = self::sign($data);
        $url = $this->API_HOST.'/api/backup/tables_add';
        $res = $this->post($url,$data);
        return $res;
    }

    /**
     * @name    获取数据表配置列表
     * @url     /api/backup/tables_edit
     * POST 请求
     * @desc    频繁请求区间：大于5秒
     * @param  $param 参数说明
     *              以下是查询条件
     *              --- s_back_id  [int] 必填  db_list接口的ID
     *              --- s_table_id  [int] 必填  tables_list接口的ID
     * 
     *
     *              以下是修改参数
     *              --- title  [string] 选填  标题
     *              --- type   [int] 选填  标题,备份类型 1统一合并备份 、各自独立备份
     *              --- back_type  [string] 选填  类型[tables_backup:自定表备份、adds_backup:增量表备份、structure_backup:表姐空备份]
     *              --- tables   [array] 选填  需要备份的表，数组格式 ["表1","表2"]
     * @param       特殊说明！！！！！！
     * @param       更新 back_type 或者 tables 时，系统都会更新 table_list接口中的 inc_val 字段数据
     *              --- setting   [array] 选填  定时备份时间设置,数组，参数如下
     * @param           $param['setting'] 参数说明,如果不明白，请参考 请按照 linux系统上的 crontab 进行设置！！！ 进行定时任务配置
     *                        --- execute_I  [string] 必填  分备份
     *                        --- execute_H  [string] 必填  时备份
     *                        --- execute_D  [string] 必填  天备份
     *                        --- execute_M  [string] 必填  月备份
     *                        --- execute_W  [string] 必填  周备份
     *                        --- del_I  [string] 必填  分删除
     *                        --- del_H  [string] 必填  时删除
     *                        --- del_D  [string] 必填  天删除
     *                        --- del_M  [string] 必填  月删除
     *                        --- del_W  [string] 必填  周删除
     *                        --- execute_del  [string] 必填  删除几天前的备份[1_day、3_day、1_week、3_week、1_month、1_quarter、1_half、1_year]
     * 数据返回 请看文档
    */
    public function tables_edit($data=[])
    {
        if(empty($data)){
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode(['s_back_id'=>'ID','s_table_id'=>'ID','参数','...','setting'=>['参数','参数','...']]),
            ];
        }else{
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode($data),
            ];
        }
        $data = self::sign($data);
        $url = $this->API_HOST.'/api/backup/tables_edit';
        $res = $this->post($url,$data);
        return $res;
    }


    /**
     * @name    数据库备份列表
     * @url     /api/backup/tables_down_list
     * POST 请求
     * @desc    频繁请求区间：大于5秒
     * @param  $param 参数说明
     *             --- page [int] 必填 获取页数
     *             --- back_id  [int] 选填  db_list接口的ID
     *             --- table_id  [int] 选填  tables_list接口的ID
     *             --- back_type  [string] 选填  类型[tables_backup:自定表备份、adds_backup:增量表备份、structure_backup:表姐空备份]
     *             --- start_time  [int] 选填  创建时间(开始)，时间戳
     *             --- end_time  [int] 选填  创建时间(结束)，时间戳
     * 数据返回 请看文档
    */
    public function tables_down_list($data=[])
    {
        if(empty($data)){
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode(['page'=>'1']),
            ];
        }else{
            $data = [
                'app_id' => $this->APP_ID,
                'app_secret' => $this->APP_SECRET,
                'param' => json_encode($data),
            ];
        }
        $data = self::sign($data);
        $url = $this->API_HOST.'/api/backup/tables_down_list';
        $res = $this->post($url,$data);
        return $res;
    }

    /*
     * 生成随机字符串
     */
    public static function getNonceStr()
    {
        $length = 8;
        $str = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz0123456789';
        $max = strlen($str); //长度
        $noncestr = '';
        for ($i=0; $i < $length; $i++) { 
            $noncestr .= $str[mt_rand(0,$max-1)];
        }
        return $noncestr;
    }

    public static function sign($data){
        $data['nonce_str'] = self::getNonceStr();
        $data['post_time'] = time();
        ksort($data);
        $data['sign'] =  md5(http_build_query($data));
        unset($data['app_secret']);
        return $data;
    }

    public static function post($url, $params = array(), $post = true)
    {
        $opts = array(
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_ENCODING       => 'gzip',
        );
        
        /* 根据请求类型设置特定参数 */
        if ($post == false) {
            $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
        } else {
            $opts[CURLOPT_URL]        = $url;
            $opts[CURLOPT_POST]       = 1;
            $opts[CURLOPT_POSTFIELDS] = $params;
            
            if (is_string($params)) {
                //发送JSON数据
                $opts[CURLOPT_HTTPHEADER] = array(
                    'Content-Type: application/json; charset=utf-8',
                    'Content-Length: ' . strlen($params),
                );
            }
        }
        /* 初始化并执行curl请求 */
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $responsedata = curl_exec($ch);
        $error        = curl_error($ch);
        curl_close($ch);
        $data = json_decode($responsedata, true);
        empty($data) ? $data = ['code'=>'404','date_time'=>date("Y-m-d H:i:s"),'msg'=>'接口请求失败,结果返回null','data'=>array()] : false;
        return $data;
    }
}
