<?php
function api_setting_time_execute($param,$id='0',$type='give'){
    $execute_I = isset($param['execute_I']) ? preg_replace("/[*\/]/i",'',$param['execute_I']) : '30';
    $execute_H = isset($param['execute_H']) ? preg_replace("/[*\/]/i",'',$param['execute_H']) : '1';
    $execute_D = isset($param['execute_D']) ? preg_replace("/[*\/]/i",'',$param['execute_D']) : '3';
    $execute_M = isset($param['execute_M']) ? preg_replace("/[*\/]/i",'',$param['execute_M']) : '1';
    $execute_W = isset($param['execute_W']) ? preg_replace("/[*\/]/i",'',$param['execute_W']) : '1';
    if($type == 'save'){
        switch ($param['setting_execute']) {
            case 'minute':
                $execute_I = "*/$execute_I";
                $execute_H = $execute_D = $execute_M = $execute_W = '*';
                break;
            case 'hours':
                $execute_H = "*/1";
                $execute_D = $execute_M = $execute_W = '*';
                break;
            case 'n_hours':
                $execute_H = "*/$execute_H";
                $execute_D = $execute_M = $execute_W = '*';
                break;
            case 'day':
                $execute_D = "*/1";
                $execute_M = $execute_W = '*';
                break;
            case 'n_day':
                $execute_D = "*/$execute_D";
                $execute_M = $execute_W = '*';
                break;
            case 'month':
                $execute_M = "*/1";
                $execute_W = '*';
                break;
            case 'n_month':
                $execute_M = "*/$execute_M";
                $execute_W = '*';
                break;
            default:
                $execute_I = "30";
                $execute_H = "*/1";
                $execute_D = $execute_M = $execute_W = '*';
                break;
        }
    }

    return [
        'execute_I' => $execute_I !== '' ?$execute_I:'*',
        'execute_H' => $execute_H !== ''?$execute_H:'*',
        'execute_D' => $execute_D !== ''?$execute_D:'*',
        'execute_M' => $execute_M !== ''?$execute_M:'*',
        'execute_W' => $execute_W !== ''?$execute_W:'*',
    ];
}

function api_option_note($str='not')
{
    $str ? $str = $str : $str = 'not';
    $arr = [
        'minute' => 'N分钟',
        'hours' => '每小时',
        'n_hours' => 'N小时',
        'day' => '每天',
        'n_day' => 'N天',
        'month' => '每月',
        'n_month' => 'N月',
        'not' => '旧数据无说明',
    ];

    return $arr[$str];
}

