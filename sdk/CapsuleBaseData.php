<?php
use Illuminate\Database\Capsule\Manager as Capsule;
class CapsuleBaseData
{
    public $type = 'default';
    public $Capsule;
    public $CapSchema;
    public $CapTableDetails;
    private $basedata = [
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'database',
        'username'  => 'root',
        'password'  => 'password',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ];

    // 通过查询获取到的数据库配置，对象
    public function conn($list)
    {
        switch ($list['connection']) {
            case 'mysql':
                $this->basedata = [
                    'driver'    => $list['connection'],
                    'host'      => $list['host'],
                    'database'  => $list['database'],
                    'username'  => $list['username'],
                    'password'  => $list['psw'],
                    'charset'   => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                    'prefix'    => $list['prefix'],
                    'mapping_types' => ['enum'=>'string','set'=>'string'],
                ];
                break;            
            default:
                admin_exit('500',[],'配置有问题');
                break;
        }
        $this->Capsule = new Capsule();
        $this->Capsule->addConnection($this->basedata);
        $this->Capsule->setAsGlobal();
        $this->Capsule->bootEloquent();
        $this->Capsule::connection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
    }

    // 如果有其他需求无法满足，只能在下面自行封装了
    public function giveSchema()
    {
        $this->CapSchema = $this->Capsule::connection()->getDoctrineSchemaManager();
    }
    public function giveType($type)
    {
        $this->type = $type;
    }

    /**
     * @param $table 可以是数组，可以是字符串（单个）
     * @param $type  获取什么内容
     * @param $exten 自定义数据【数组】
    */
    public function getTableInfo($table=[],$type='',$exten=[])
    {
        if(empty($table)) return [];
        $arr2 = $arr = [];
        switch ($type) {
            case 'primary_auto':
                foreach ($table as $v) {
                    $arr[] = $this->tablePrimaryAuto($v);
                }
                break;
            case 'name_comment':
                foreach ($table as $v) {
                    $arr[] = $this->tablesNameComment($v);
                }
                break;
        }
        return $arr;
    }


    /**
     * 获取表的表名和表备注
    */
    public function tablesNameComment($table)
    {
        $detail = $this->Capsule::connection()->getDoctrineSchemaManager()->listTableDetails($table);
        $name = $detail->getComment();
        
        $name = empty($name) ? '没有表注释' : $name;
        return ['table'=>$table,'name'=>$table."($name)"];
    }
}