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

function setting_time_del($param,$id='0',$type='give'){
    $del_I = isset($param['del_I']) ? preg_replace("/[*\/]/i",'',$param['del_I']) : '30';
    $del_H = isset($param['del_H']) ? preg_replace("/[*\/]/i",'',$param['del_H']) : '1';
    $del_D = isset($param['del_D']) ? preg_replace("/[*\/]/i",'',$param['del_D']) : '3';
    $del_M = isset($param['del_M']) ? preg_replace("/[*\/]/i",'',$param['del_M']) : '1';
    $del_W = isset($param['del_W']) ? preg_replace("/[*\/]/i",'',$param['del_W']) : '1';
    if($type == 'save'){
        switch ($param['setting_del']) {
            case 'minute':
                $del_I = "*/$del_I";
                $del_H = $del_D = $del_M = $del_W = '*';
                break;
            case 'hours':
                $del_H = "*/1";
                $del_D = $del_M = $del_W = '*';
                break;
            case 'n_hours':
                $del_H = "*/$del_H";
                $del_D = $del_M = $del_W = '*';
                break;
            case 'day':
                $del_D = "*/1";
                $del_M = $del_W = '*';
                break;
            case 'n_day':
                $del_D = "*/$del_D";
                $del_M = $del_W = '*';
                break;
            case 'month':
                $del_M = "*/1";
                $del_W = '*';
                break;
            case 'n_month':
                $del_M = "*/$del_M";
                $del_W = '*';
                break;
            default:
                $del_I = "30";
                $del_H = "*/1";
                $del_D = $del_M = $del_W = '*';
                break;
        }
    }

    return [
        'del_I' => $del_I !== ''?$del_I:'*',
        'del_H' => $del_H !== ''?$del_H:'*',
        'del_D' => $del_D !== ''?$del_D:'*',
        'del_M' => $del_M !== ''?$del_M:'*',
        'del_W' => $del_W !== ''?$del_W:'*',
    ];
}

function api_option($str =''){
    switch ($str) {
        case 'minute':
            $html = [
                '<option value="minute" selected="">N分钟</option>',
                '<option value="hours" >每小时</option>',
                '<option value="n_hours" >N小时</option>',
                '<option value="day" >每天</option>',
                '<option value="n_day" >N天</option>',
                '<option value="month" >每月</option>',
                '<option value="n_month" >N月</option>'
            ];
            break;
        case 'hours':
            $html = [
                '<option value="minute" >N分钟</option>',
                '<option value="hours" selected="">每小时</option>',
                '<option value="n_hours" >N小时</option>',
                '<option value="day" >每天</option>',
                '<option value="n_day" >N天</option>',
                '<option value="month" >每月</option>',
                '<option value="n_month" >N月</option>'
            ];
            break;
        case 'n_hours':
            $html = [
                '<option value="minute" >N分钟</option>',
                '<option value="hours" >每小时</option>',
                '<option value="n_hours" selected="">N小时</option>',
                '<option value="day" >每天</option>',
                '<option value="n_day" >N天</option>',
                '<option value="month" >每月</option>',
                '<option value="n_month" >N月</option>'
            ];
            break;
        case 'day':
            $html = [
                '<option value="minute" >N分钟</option>',
                '<option value="hours" >每小时</option>',
                '<option value="n_hours" >N小时</option>',
                '<option value="day" selected="">每天</option>',
                '<option value="n_day" >N天</option>',
                '<option value="month" >每月</option>',
                '<option value="n_month" >N月</option>'
            ];
            break;
        case 'n_day':
            $html = [
                '<option value="minute" >N分钟</option>',
                '<option value="hours" >每小时</option>',
                '<option value="n_hours" >N小时</option>',
                '<option value="day" >每天</option>',
                '<option value="n_day" selected="">N天</option>',
                '<option value="month" >每月</option>',
                '<option value="n_month" >N月</option>'
            ];
            break;
        case 'month':
            $html = [
                '<option value="minute" >N分钟</option>',
                '<option value="hours" >每小时</option>',
                '<option value="n_hours" >N小时</option>',
                '<option value="day" >每天</option>',
                '<option value="n_day" >N天</option>',
                '<option value="month" selected="">每月</option>',
                '<option value="n_month" >N月</option>'
            ];
            break;
        case 'n_month':
            $html = [
                '<option value="minute" >N分钟</option>',
                '<option value="hours" >每小时</option>',
                '<option value="n_hours" >N小时</option>',
                '<option value="day" >每天</option>',
                '<option value="n_day" >N天</option>',
                '<option value="month" >每月</option>',
                '<option value="n_month" selected="">N月</option>'
            ];
            break;
        default:
            $html = [
                '<option value="minute" >N分钟</option>',
                '<option value="hours" selected="">每小时</option>',
                '<option value="n_hours" >N小时</option>',
                '<option value="day" >每天</option>',
                '<option value="n_day" >N天</option>',
                '<option value="month" >每月</option>',
                '<option value="n_month" >N月</option>'
            ];
            break;
    }
    return $html;
}
