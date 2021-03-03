<?php

namespace Encore\ApiBackup\Http\Controllers;

use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;

use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Encore\Admin\Grid\Model;
use Encore\ApiBackup\ApiBackup;
require_once __DIR__."/../../../sdk/Sdk.php";
require_once __DIR__."/../../../sdk/CapsuleBaseData.php";

class ApiBackupController extends Controller
{
    public $setting_del = [
        '1_day'=>'一天',
        '3_day'=>'三天',
        '5_day'=>'五天',
        '1_week'=>'一周',
        '3_week'=>'三周',
        '1_month'=>'一个月',
        '1_quarter'=>'一个季度',
        '1_half'=>'半年',
        '1_year'=>'一年',
    ];
    public function index(Content $content)
    {
        return $content
            ->title('Title')
            ->description('Description')
            ->body(view('apibackup::index'));
    }

    public function dbListAjax()
    {
        !empty(Request()->page) ? $param['page'] = Request()->page : $param['page'] = 1;
        $Sdk = new \Sdk();
        $res = $Sdk->db_list($param);
        return json_encode($res,JSON_UNESCAPED_UNICODE);
    }
    public function dbList()
    {
        $param = [];
        $data = [
            'page' => Request()->page ?? 1,
            'back_id' => Request()->back_id,
            'title' => Request()->title,
            'host' => Request()->host,
            'database' => Request()->database,
        ];
        !empty(Request()->page) ? $param['page'] = Request()->page : $param['page'] = 1;
        !empty(Request()->back_id) ? $param['back_id'] = Request()->back_id : false;
        !empty(Request()->title) ? $param['title'] = Request()->title : false;
        !empty(Request()->host) ? $param['host'] = Request()->host : false;
        !empty(Request()->database) ? $param['database'] = Request()->database : false;

        $Sdk = new \Sdk();
        $res = $Sdk->db_list($param);

        return Admin::content(function (Content $content) use($res,$data){
            $content->header('库备份配置列表');
            $content->description('Api接口');
            $content->row(view('apibackup::db_list',['res'=>$res,'param'=>$data]));
        });
    }

    public function dbAdd()
    {
        $param = Request()->input();
        $Sdk = new \Sdk();

        return Admin::content(function (Content $content) {
            $content->header('库备份配置添加');
            $content->description('Api接口');
            $content->row(view('apibackup::db_add'));
        });
    }
    public function dbAddPost()
    {
        $param = Request()->input();
        $setting = $param['setting'];
        $setting = array_merge($setting,setting_time_execute($setting,0,'save'));
        $setting = array_merge($setting,setting_time_del($setting,0,'save'));
        $param['setting'] = $setting;
        unset($param['_token']);
        unset($param['_previous_']);
        $Sdk = new \Sdk();
        $res = $Sdk->db_add($param);
        return json_encode($res,JSON_UNESCAPED_UNICODE);
    }

    public function dbEdit()
    {
        $data = [
            'page'=>1,
            'back_id' => Request()->back_id,
        ];
        $Sdk = new \Sdk();
        $res = $Sdk->db_list($data);
        $res['code'] == '200' ? $res['list'] = $res['data']['list'][0] : $res['list'] = [];
        if($res['list']){
            $setting = $res['list']['setting'];
            $setting = array_merge($setting,setting_time_execute($setting,0));
            $setting = array_merge($setting,setting_time_del($setting,0));
            $res['list']['setting'] = $setting;
            $execute = api_option($setting['setting_execute']);
            $del = api_option($setting['setting_del']);
        }else{
            $execute = api_option();
            $del = api_option();
        }
        dd($del);
        return Admin::content(function (Content $content) use($res,$execute,$del){
            $content->header('库备份配置修改');
            $content->description('Api接口');
            $content->row(view('apibackup::db_edit',['res'=>$res,'back_id'=>Request()->back_id,'execute'=>$execute,'del'=>$del]));
        });
    }

    public function dbEditPost()
    {
        $param = Request()->input();
        unset($param['_token']);
        unset($param['_previous_']);
        $Sdk = new \Sdk();
        $res = $Sdk->db_edit($param);
        return json_encode($res,JSON_UNESCAPED_UNICODE);
    }

    public function dbDownList()
    {
        $param = [];
        $data = [
            'page' => Request()->page ?? 1,
            'back_id' => Request()->back_id,
            'title' => Request()->title,
            'host' => Request()->host,
            'database' => Request()->database,
            'start_time' => isset(Request()->created_at['start']) && Request()->created_at['start'] ? Request()->created_at['start'] : '',
            'end_time' => isset(Request()->created_at['end']) && Request()->created_at['end'] ? Request()->created_at['end'] : '',
        ];
        !empty(Request()->page) ? $param['page'] = Request()->page : $param['page'] = 1;
        !empty(Request()->back_id) ? $param['back_id'] = Request()->back_id : false;
        !empty(Request()->title) ? $param['title'] = Request()->title : false;
        !empty(Request()->host) ? $param['host'] = Request()->host : false;
        !empty(Request()->database) ? $param['database'] = Request()->database : false;
        !empty(Request()->created_at['start']) ? $param['start_time'] = strtotime(Request()->created_at['start']) : false;
        !empty(Request()->created_at['end']) ? $param['end_time'] = strtotime(Request()->created_at['end']) : false;
        
        $Sdk = new \Sdk();
        $res = $Sdk->db_down_list($param);
        Redis::set('admin_db_down_list',json_encode($res));
        return Admin::content(function (Content $content) use($res,$data){
            $content->header('库备份列表');
            $content->description('Api接口');
            $content->row(view('apibackup::db_down_list',['res'=>$res,'param'=>$data]));
        });
    }

    public function tablesList()
    {
        $param = [];
        $data = [
            'page' => Request()->page ?? 1,
            'back_id' => Request()->back_id,
            'table_id' => Request()->table_id,
            'back_type' => Request()->back_type,
        ];
        !empty(Request()->page) ? $param['page'] = Request()->page : $param['page'] = 1;
        !empty(Request()->back_id) ? $param['back_id'] = Request()->back_id : false;
        !empty(Request()->table_id) ? $param['table_id'] = Request()->table_id : false;
        !empty(Request()->back_type) ? $param['back_type'] = Request()->back_type : false;
        $Sdk = new \Sdk();
        $res = $Sdk->tables_list($param);

        return Admin::content(function (Content $content) use($res,$data){
            $content->header('库备份配置列表');
            $content->description('Api接口');
            $content->row(view('apibackup::tables_list',['res'=>$res,'param'=>$data]));
        });
    }

    public function tablesAdd()
    {
        $param = Request()->input();
        !empty(Request()->page) ? $param['page'] = Request()->page : $param['page'] = 1;
        $Sdk = new \Sdk();
        $db_list = $Sdk->db_list($param);
        $db_list['code'] == '200' ? $list = $db_list['data']['list'] : $list = [];
        Redis::setex('admin_back_db',300,json_encode($list));
        return Admin::content(function (Content $content) use($list){
            $content->header('表备份配置添加');
            $content->description('Api接口');
            $content->row(view('apibackup::tables_add',['list'=>$list]));
        });
    }

    public function tablesAddPost()
    {
        $param = Request()->input();
        array_pop($param['tables']);
        unset($param['_token']);
        unset($param['_previous_']);
        $Sdk = new \Sdk();
        $res = $Sdk->tables_add($param);
        return json_encode($res,JSON_UNESCAPED_UNICODE);
    }

    public function tablesEdit()
    {
        $data = [
            'page'=>1,
            'table_id' => Request()->table_id,
        ];
        $Sdk = new \Sdk();
        $res = $Sdk->tables_list($data);
        $res['code'] == '200' && !empty($res['data']['list']) ? $res['list'] = $res['data']['list'][0] : $res['list'] = [];
        $list = $db = [];
        if($res['list']){
            $param2 = [
                'page'=> 1,
                'back_id' => $res['list']['back_id'],
            ];
            $db = $Sdk->db_list($param2);
            $db = $db['data']['list'][0];
            $db['nickname'] = '当前已选择库 --- '.$db['nickname'];

            !empty(Request()->page) ? $param['page'] = Request()->page : $param['page'] = 1;
            $db_list = $Sdk->db_list($param);
            $db_list['code'] == '200' ? $list = $db_list['data']['list'] : $list = [];
            Redis::setex('admin_back_db',300,json_encode($list));
        }
               
        return Admin::content(function (Content $content) use($res,$list,$db){
            $content->header('表备份配置添加');
            $content->description('Api接口');
            $content->row(view('apibackup::tables_edit',['res'=>$res,'list'=>$list,'db'=>$db,'table_id'=>Request()->table_id]));
        });
    }

    public function tablesEditPost()
    {
        $param = Request()->input();
        array_pop($param['tables']);
        unset($param['_token']);
        unset($param['_previous_']);
        $Sdk = new \Sdk();
        $res = $Sdk->tables_edit($param);
        return json_encode($res,JSON_UNESCAPED_UNICODE);
    }

    public function tablesDb()
    {
        $back_id = Request()->back_id;
        $type = Request()->type;
        $back_list = json_decode(Redis::get('admin_back_db'),true);
        if(empty($back_list)) return json_encode(['code'=>'500','msg'=>'库列表数据已过期,刷新页面重新获取','data'=>[]]);
        $db = [];
        foreach ($back_list as $v) {
            if($v['id'] == $back_id){
                $db = $v;
                break;
            }
        }
        if(empty($db)) return json_encode(['code'=>'500','msg'=>'请检查是否选择正确的项目库','data'=>[]]);
        
        $CapsuleBaseData = new \CapsuleBaseData();
        $CapsuleBaseData->conn($db);
        $Capsule = $CapsuleBaseData->Capsule;
        $tables = $Capsule::connection()->getDoctrineSchemaManager()->listTableNames();
        $arr = $CapsuleBaseData->getTableInfo($tables,'name_comment');
        $html = '';

        if($type == 'add'){
            foreach ($arr as $k => $v) {
                $table = $v['table'];
                $name = $v['name'];
                // 多选下拉框
                $option = '<option value="'.$table.'" >'.$name.'</option>';
                $html .= $option;
            }
        }else{
            $tables = Request()->tables;
            foreach ($arr as $k => $v) {
                $table = $v['table'];
                $name = $v['name'];
                // 多选下拉框
                in_array($table, $tables) ? $selected = 'selected=""' : $selected = '';
                $option = '<option value="'.$table.'" '.$selected.'>'.$name.'</option>';
                $html .= $option;
            }
        }
        
        return json_encode(['code'=>'200','msg'=>'请求成功','data'=>$html],JSON_UNESCAPED_UNICODE);
    }

    public function tablesDownList()
    {
        $param = [];
        $data = [
            'page' => Request()->page ?? 1,
            'back_id' => Request()->back_id,
            'table_id' => Request()->table_id,
            'back_type' => Request()->back_type,
            'start_time' => isset(Request()->created_at['start']) && Request()->created_at['start'] ? Request()->created_at['start'] : '',
            'end_time' => isset(Request()->created_at['end']) && Request()->created_at['end'] ? Request()->created_at['end'] : '',
        ];
        !empty(Request()->page) ? $param['page'] = Request()->page : $param['page'] = 1;
        !empty(Request()->back_id) ? $param['back_id'] = Request()->back_id : false;
        !empty(Request()->table_id) ? $param['title'] = Request()->table_id : false;
        !empty(Request()->back_type) ? $param['back_type'] = Request()->back_type : false;
        !empty(Request()->created_at['start']) ? $param['start_time'] = strtotime(Request()->created_at['start']) : false;
        !empty(Request()->created_at['end']) ? $param['end_time'] = strtotime(Request()->created_at['end']) : false;

        $Sdk = new \Sdk();
        $res = $Sdk->tables_down_list($param);
        
        Redis::set('admin_tables_down_list',json_encode($res));
        return Admin::content(function (Content $content) use($res,$data){
            $content->header('库备份列表');
            $content->description('Api接口');
            $content->row(view('apibackup::tables_down_list',['res'=>$res,'param'=>$data]));
        });
    }

    public function down()
    {
        $id = Request()->input('id');
        $is_down = Request()->input('is_down');
        $model_down = Request()->input('model_down');
        is_array($id) ? false : $id = explode(',', $id);
        return view('apibackup::down',['id'=>implode(',', $id),'is_down'=>$is_down,'model_down'=>$model_down,'back_host'=>env('BACKUP_HOST','')]);
    }

    public function getDownList()
    {
        $id = Request()->input('id');
        $model_down = Request()->input('model_down');
        is_array($id) ? false : $id = explode(',', $id);
        
        if($model_down == 'backup_tables'){
            $res = json_decode(Redis::get('admin_tables_down_list'),true);
            $list = [];
            if($res['code'] == '200'){
                foreach ($res['data']['list'] as $v) {
                    if(in_array($v['id'],$id)){
                        $list[] = $v;
                    }
                }
            }
        }else{
            $res = json_decode(Redis::get('admin_db_down_list'),true);
            $list = [];
            if($res['code']=='200'){
                foreach ($res['data']['list'] as $v) {
                    if(in_array($v['id'],$id)){
                        $list[] = $v;
                    }
                }
            }
        }
        
        // 写入redis缓存
        $redis_icon = $this->getToekn();
        Redis::set($redis_icon,json_encode($list));
        $res = [
            'count' => count($list),
            'down_list' => $list,
            'redis_icon' => $redis_icon,
        ];
        admin_exit('200',$res);
    }

    public function getToekn($num = 8){
        $token = '';
        $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        for ($i=0; $i < $num; $i++) { 
            $token .= $str[mt_rand(0,strlen($str)-1)];
        }
        return $token;
    }
}