function setting_execute(setting_time_val){
    var setting_time_html = '';
    switch (setting_time_val){
        case 'minute':
            setting_time_html = '<div class="setting_execute_div setting_execute_i"><input type="text" id="execute_I" name="setting[execute_I]" value="'+execute_I+'" class="form-control setting_execute_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
            setting_time_html += '<input type="hidden" name="setting[execute_H]" value="*"><input type="hidden" name="setting[execute_D]" value="*"><input type="hidden" name="setting[execute_M]" value="*"><input type="hidden" name="setting[execute_W]" value="*">'
        break;

        case 'hours':
            setting_time_html = '<div class="setting_execute_div setting_execute_i"><input type="text" id="execute_I" name="setting[execute_I]" value="'+execute_I+'" class="form-control setting_execute_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
            setting_time_html += '<input type="hidden" name="setting[execute_H]" value="*"><input type="hidden" name="setting[execute_D]" value="*"><input type="hidden" name="setting[execute_M]" value="*"><input type="hidden" name="setting[execute_W]" value="*">'
        break;
            
        case 'n_hours':
            setting_time_html = '<div class="setting_execute_div setting_execute_h"><input type="text" id="execute_H" name="setting[execute_H]" value="'+execute_H+'" class="form-control setting_execute_H" placeholder="输入时钟（0-23）"><div class="form-control">时</div></div><div class="setting_execute_div setting_execute_i"><input type="text" id="execute_I" name="setting[execute_I]" value="'+execute_I+'" class="form-control setting_execute_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
            setting_time_html += '<input type="hidden" name="setting[execute_D]" value="*"><input type="hidden" name="setting[execute_M]" value="*"><input type="hidden" name="setting[execute_W]" value="*">'
        break;

        case 'day':
            setting_time_html = '<div class="setting_execute_div setting_execute_h"><input type="text" id="execute_H" name="setting[execute_H]" value="'+execute_H+'" class="form-control setting_execute_H" placeholder="输入时钟（0-23）"><div class="form-control">时</div></div><div class="setting_execute_div setting_execute_i"><input type="text" id="execute_I" name="setting[execute_I]" value="'+execute_I+'" class="form-control setting_execute_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
            setting_time_html += '<input type="hidden" name="setting[execute_D]" value="*"><input type="hidden" name="setting[execute_M]" value="*"><input type="hidden" name="setting[execute_W]" value="*">'
        break;

        case 'n_day':
            setting_time_html = '<div class="setting_execute_div setting_execute_d"><input type="text" id="execute_D" name="setting[execute_D]" value="'+execute_D+'" class="form-control setting_execute_D" placeholder="输入天数（0-31）"><div class="form-control">天</div></div><div class="setting_execute_div setting_execute_h"><input type="text" id="execute_H" name="setting[execute_H]" value="'+execute_H+'" class="form-control setting_execute_H" placeholder="输入时钟（0-23）"><div class="form-control">时</div></div><div class="setting_execute_div setting_execute_i"><input type="text" id="execute_I" name="setting[execute_I]" value="'+execute_I+'" class="form-control setting_execute_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
            setting_time_html += '<input type="hidden" name="setting[execute_M]" value="*"><input type="hidden" name="setting[execute_W]" value="*">'
        break;

        // case 'week':

        //     setting_time_html = '<div class="setting_execute_div setting_execute_w"><select class="form-control setting_execute_W select2-hidden-accessible" style="width: 100%;" name="setting[execute_W]" data-value="1" tabindex="-1" aria-hidden="true"><option value="1" selected="">星期一</option><option value="2" >星期二</option><option value="3" >星期三</option><option value="4" >星期四</option><option value="5" >星期五</option><option value="6">星期六</option><option value="7" >星期日</option></select></div><div class="setting_execute_div setting_execute_h"><input type="text" id="execute_H" name="setting[execute_H]" value="'+execute_H+'" class="form-control setting_execute_H" placeholder="输入时钟（0-23）"><div class="form-control">时</div></div><div class="setting_execute_div setting_execute_i"><input type="text" id="execute_I" name="setting[execute_I]" value="'+execute_I+'" class="form-control setting_execute_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
        //     setting_time_html += '<input type="hidden" name="setting[execute_D]" value="'+execute_D+'"><input type="hidden" name="setting[execute_M]" value="'+execute_M+'">'
        break;

        case 'month':
            setting_time_html = '<div class="setting_execute_div setting_execute_d"><input type="text" id="execute_D" name="setting[execute_D]" value="'+execute_D+'" class="form-control setting_execute_D" placeholder="输入天数（0-31）"><div class="form-control">天</div></div><div class="setting_execute_div setting_execute_h"><input type="text" id="execute_H" name="setting[execute_H]" value="'+execute_H+'" class="form-control setting_execute_H" placeholder="输入时钟（0-23）"><div class="form-control">时</div></div><div class="setting_execute_div setting_execute_i"><input type="text" id="execute_I" name="setting[execute_I]" value="'+execute_I+'" class="form-control setting_execute_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
            setting_time_html += '<input type="hidden" name="setting[execute_M]" value="*"><input type="hidden" name="setting[execute_W]" value="*">'
        break;

        case 'n_month':
            setting_time_html = '<div class="setting_execute_div setting_execute_m"><input type="text" id="execute_M" name="setting[execute_M]" value="'+execute_M+'" class="form-control setting_execute_M" placeholder="输入月份（1-12）"><div class="form-control">月</div></div><div class="setting_execute_div setting_execute_d"><input type="text" id="execute_D" name="setting[execute_D]" value="'+execute_D+'" class="form-control setting_execute_D" placeholder="输入天数（0-31）"><div class="form-control">天</div></div><div class="setting_execute_div setting_execute_h"><input type="text" id="execute_H" name="setting[execute_H]" value="'+execute_H+'" class="form-control setting_execute_H" placeholder="输入时钟（0-23）"><div class="form-control">时</div></div><div class="setting_execute_div setting_execute_i"><input type="text" id="execute_I" name="setting[execute_I]" value="'+execute_I+'" class="form-control setting_execute_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
            setting_time_html += '<input type="hidden" name="setting[execute_W]" value="*">'
        break;

        default :
            layer.msg('请选择正确的执行间隔',{icon:2,time:2500},function(){
                return false;
            })
        break;
    }
    $('.setting_execute').html('');
    $('.setting_execute').html(setting_time_html);
}

function setting_del(setting_time_val){
    var setting_time_html = '';
    switch (setting_time_val){
        case 'minute':
            setting_time_html = '<div class="setting_del_div setting_del_i"><input type="text" id="del_I" name="setting[del_I]" value="'+del_I+'" class="form-control setting_del_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
            setting_time_html += '<input type="hidden" name="setting[del_H]" value="*"><input type="hidden" name="setting[del_D]" value="*"><input type="hidden" name="setting[del_M]" value="*"><input type="hidden" name="setting[del_W]" value="*">'
        break;

        case 'hours':
            setting_time_html = '<div class="setting_del_div setting_del_i"><input type="text" id="del_I" name="setting[del_I]" value="'+del_I+'" class="form-control setting_del_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
            setting_time_html += '<input type="hidden" name="setting[del_H]" value="*"><input type="hidden" name="setting[del_D]" value="*"><input type="hidden" name="setting[del_M]" value="*"><input type="hidden" name="setting[del_W]" value="*">'
        break;
            
        case 'n_hours':
            setting_time_html = '<div class="setting_del_div setting_del_h"><input type="text" id="del_H" name="setting[del_H]" value="'+del_H+'" class="form-control setting_del_H" placeholder="输入时钟（0-23）"><div class="form-control">时</div></div><div class="setting_del_div setting_del_i"><input type="text" id="del_I" name="setting[del_I]" value="'+del_I+'" class="form-control setting_del_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
            setting_time_html += '<input type="hidden" name="setting[del_D]" value="*"><input type="hidden" name="setting[del_M]" value="*"><input type="hidden" name="setting[del_W]" value="*">'
        break;

        case 'day':
            setting_time_html = '<div class="setting_del_div setting_del_h"><input type="text" id="del_H" name="setting[del_H]" value="'+del_H+'" class="form-control setting_del_H" placeholder="输入时钟（0-23）"><div class="form-control">时</div></div><div class="setting_del_div setting_del_i"><input type="text" id="del_I" name="setting[del_I]" value="'+del_I+'" class="form-control setting_del_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
            setting_time_html += '<input type="hidden" name="setting[del_D]" value="*"><input type="hidden" name="setting[del_M]" value="*"><input type="hidden" name="setting[del_W]" value="*">'
        break;

        case 'n_day':
            setting_time_html = '<div class="setting_del_div setting_del_d"><input type="text" id="del_D" name="setting[del_D]" value="'+del_D+'" class="form-control setting_del_D" placeholder="输入天数（0-31）"><div class="form-control">天</div></div><div class="setting_del_div setting_del_h"><input type="text" id="del_H" name="setting[del_H]" value="'+del_H+'" class="form-control setting_del_H" placeholder="输入时钟（0-23）"><div class="form-control">时</div></div><div class="setting_del_div setting_del_i"><input type="text" id="del_I" name="setting[del_I]" value="'+del_I+'" class="form-control setting_del_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
            setting_time_html += '<input type="hidden" name="setting[del_M]" value="*"><input type="hidden" name="setting[del_W]" value="*">'
        break;

        // case 'week':
        //     setting_time_html = '<div class="setting_del_div setting_del_w"><select class="form-control setting_del_W select2-hidden-accessible" style="width: 100%;" name="setting[del_W]" data-value="1" tabindex="-1" aria-hidden="true"><option value="1" selected="">星期一</option><option value="2" >星期二</option><option value="3" >星期三</option><option value="4" >星期四</option><option value="5" >星期五</option><option value="6">星期六</option><option value="7" >星期日</option></select></div><div class="setting_del_div setting_del_h"><input type="text" id="del_H" name="setting[del_H]" value="3" class="form-control setting_del_H" placeholder="输入时钟（0-23）"><div class="form-control">时</div></div><div class="setting_del_div setting_del_i"><input type="text" id="del_I" name="setting[del_I]" value="30" class="form-control setting_del_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
        //     setting_time_html += '<input type="hidden" name="setting[del_D]" value="*"><input type="hidden" name="setting[del_M]" value="*">'
        // break;

        case 'month':
            setting_time_html = '<div class="setting_del_div setting_del_d"><input type="text" id="del_D" name="setting[del_D]" value="'+del_D+'" class="form-control setting_del_D" placeholder="输入天数（0-31）"><div class="form-control">天</div></div><div class="setting_del_div setting_del_h"><input type="text" id="del_H" name="setting[del_H]" value="'+del_H+'" class="form-control setting_del_H" placeholder="输入时钟（0-23）"><div class="form-control">时</div></div><div class="setting_del_div setting_del_i"><input type="text" id="del_I" name="setting[del_I]" value="'+del_I+'" class="form-control setting_del_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
            setting_time_html += '<input type="hidden" name="setting[del_M]" value="*"><input type="hidden" name="setting[del_W]" value="*">'
        break;

        case 'n_month':
            setting_time_html = '<div class="setting_del_div setting_del_i"><input type="text" id="del_M" name="setting[del_M]" value="'+del_M+'" class="form-control setting_del_M" placeholder="输入月份（1-12）"><div class="form-control">月</div></div><div class="setting_del_div setting_del_d"><input type="text" id="del_D" name="setting[del_D]" value="'+del_D+'" class="form-control setting_del_D" placeholder="输入天数（0-31）"><div class="form-control">天</div></div><div class="setting_del_div setting_del_h"><input type="text" id="del_H" name="setting[del_H]" value="'+del_H+'" class="form-control setting_del_H" placeholder="输入时钟（0-23）"><div class="form-control">时</div></div><div class="setting_del_div setting_del_i"><input type="text" id="del_I" name="setting[del_I]" value="'+del_I+'" class="form-control setting_del_I" placeholder="输入分钟（0-59）"><div class="form-control">分</div></div>';
            setting_time_html += '<input type="hidden" name="setting[del_W]" value="*">'
        break;

        default :
            layer.msg('请选择正确的删除执行间隔',{icon:2,time:2500},function(){
                return false;
            })
        break;
    }
    $('.setting_del').html('');
    $('.setting_del').html(setting_time_html);
}