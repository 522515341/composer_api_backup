@if ($res['code'] != '200' || empty($res['data']['list']))
@else
<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">创建</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="/admin/backup/db_edit" method="post" class="form-horizontal">
            <input type="hidden" name="s_back_id" value="{{$res['list']['id']}}">
            <div class="box-body">
                <div class="fields-group">
                    <div class="col-md-12">
                        <div class="form-group  ">
                            <label for="title" class="col-sm-2 asterisk control-label">标识</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil fa-fw"></i>
                                    </span>
                                    <input type="text" id="title" name="title" value="{{$res['list']['title']}}" class="form-control title" placeholder="输入 标识" required="1"></div>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="nickname" class="col-sm-2 asterisk control-label">项目名</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil fa-fw"></i>
                                    </span>
                                    <input type="text" id="nickname" name="nickname" value="{{$res['list']['nickname']}}" class="form-control nickname" placeholder="输入 项目名" required="1"></div>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="connection" class="col-sm-2  control-label">数据库类型</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="connection" value="{$res['list']['connection']}}">
                                <select class="form-control connection select2-hidden-accessible" style="width: 100%;" name="connection" data-value="{{$res['list']['connection']}}" tabindex="-1" aria-hidden="true">
                                    <option value="mysql" {{$res['list']['connection'] == 'mysql' ? 'selected=""' : ''}}>mysql</option>
                                    <option value="sqlite" {{$res['list']['connection'] == 'sqlite' ? 'selected=""' : ''}}>sqlite</option>
                                    <option value="pgsql" {{$res['list']['connection'] == 'pgsql' ? 'selected=""' : ''}}>pgsql</option>
                                    <option value="sqlsrv" {{$res['list']['connection'] == 'sqlsrv' ? 'selected=""' : ''}}>sqlsrv</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="host" class="col-sm-2 asterisk control-label">服务器地址</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil fa-fw"></i>
                                    </span>
                                    <input type="text" id="host" name="host" value="{{$res['list']['host']}}" class="form-control host" placeholder="输入 服务器地址" required="1"></div>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="port" class="col-sm-2 asterisk control-label">端口</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil fa-fw"></i>
                                    </span>
                                    <input type="text" id="port" name="port" value="{{$res['list']['port']}}" class="form-control port" placeholder="输入 端口" required="1"></div>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="username" class="col-sm-2 asterisk control-label">账号</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil fa-fw"></i>
                                    </span>
                                    <input type="text" id="username" name="username" value="{{$res['list']['username']}}" class="form-control username" placeholder="输入 账号" required="1"></div>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="psw" class="col-sm-2  control-label">密码</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-eye-slash fa-fw"></i>
                                    </span>
                                    <input type="password" id="psw" name="psw" value="{{$res['list']['psw']}}" class="form-control psw" placeholder="输入 密码"></div>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="database" class="col-sm-2 asterisk control-label">库名</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil fa-fw"></i>
                                    </span>
                                    <input type="text" id="database" name="database" value="{{$res['list']['database']}}" class="form-control database" placeholder="输入 库名" required="1"></div>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="prefix" class="col-sm-2  control-label">表前缀</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil fa-fw"></i>
                                    </span>
                                    <input type="text" id="prefix" name="prefix" value="{{$res['list']['prefix']}}" class="form-control prefix" placeholder="输入 表前缀"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2  control-label"></label>
                            <div class="col-sm-8">
                                <br>
                                <br></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 ">
                                <h4 class="pull-right">备份配置</h4></div>
                            <div class="col-sm-8"></div>
                        </div>
                        <hr style="margin-top: 0px;">
                        <div id="embed-setting" class="embed-setting">
                            <div class="embed-setting-forms">
                                <div class="embed-setting-form fields-group">
                                    <div class="form-group">
                                        <label class="col-sm-2  control-label"></label>
                                        <div class="col-sm-8">
                                            <p style="color:red">注意事项：</p>
                                            <p>每时：每个小时备份</p>
                                            <p>N小时：
                                                <span style="color: red">每隔几个小时</span>进行备份
                                            </p>
                                            <p><span style="color: red">* </span>代表无设置</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2  control-label">执行间隔</label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-10">
                                                <div class="input-group col-sm-10">
                                                    <select class="form-control setting_setting_execute select2-hidden-accessible" style="width: 100%;" name="setting[setting_execute]" data-value="" tabindex="-1" aria-hidden="true">
                                                        <option value="minute" {{$execute == 'minute' ? 'selected=""' : ''}}>N分钟</option>
                                                        <option value="hours" {{$execute == 'hours' ? 'selected=""' : ''}}>每小时</option>
                                                        <option value="n_hours" {{$execute == 'n_hours' ? 'selected=""' : ''}}>N小时</option>
                                                        <option value="day" {{$execute == 'day' ? 'selected=""' : ''}}>每天</option>
                                                        <option value="n_day" {{$execute == 'n_day' ? 'selected=""' : ''}}>N天</option>
                                                        <option value="month" {{$execute == 'month' ? 'selected=""' : ''}}>每月</option>
                                                        <option value="n_month" {{$execute == 'n_month' ? 'selected=""' : ''}}>N月</option>
                                                    </select>
                                                </div>
                                                <div class="setting_execute">
                                                    <div class="setting_execute_div setting_execute_i">
                                                        <input type="text" id="execute_I" name="setting[execute_I]" value="{{$res['list']['setting']['execute_I']}}" class="form-control setting_execute_I" placeholder="输入分钟（0-59）">
                                                        <div class="form-control">分</div></div>
                                                    <input type="hidden" name="setting[execute_H]" value="{{$res['list']['setting']['execute_H']}}">
                                                    <input type="hidden" name="setting[execute_D]" value="{{$res['list']['setting']['execute_D']}}">
                                                    <input type="hidden" name="setting[execute_M]" value="{{$res['list']['setting']['execute_M']}}">
                                                    <input type="hidden" name="setting[execute_W]" value="{{$res['list']['setting']['execute_W']}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2  control-label">删除执行间隔</label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-10">
                                                <div class="input-group col-sm-10">
                                                    <select class="form-control setting_setting_del select2-hidden-accessible" style="width: 100%;" name="setting[setting_del]" data-value="" tabindex="-1" aria-hidden="true">
                                                        <option value="minute" {{$del == 'minute' ? 'selected=""' : ''}}>N分钟</option>
                                                        <option value="hours" {{$del == 'hours' ? 'selected=""' : ''}}>每小时</option>
                                                        <option value="n_hours" {{$del == 'n_hours' ? 'selected=""' : ''}}>N小时</option>
                                                        <option value="day" {{$del == 'day' ? 'selected=""' : ''}}>每天</option>
                                                        <option value="n_day" {{$del == 'n_day' ? 'selected=""' : ''}}>N天</option>
                                                        <option value="month" {{$del == 'month' ? 'selected=""' : ''}}>每月</option>
                                                        <option value="n_month" {{$del == 'n_month' ? 'selected=""' : ''}}>N月</option>
                                                    </select>
                                                </div>
                                                <div class="setting_del">
                                                    <div class="setting_del_div setting_del_i">
                                                        <input type="text" id="del_I" name="setting[del_I]" value="{{$res['list']['setting']['del_I']}}" class="form-control setting_del_I" placeholder="输入分钟（0-59）">
                                                        <div class="form-control">分</div></div>
                                                    <input type="hidden" name="setting[del_H]" value="{{$res['list']['setting']['del_H']}}">
                                                    <input type="hidden" name="setting[del_D]" value="{{$res['list']['setting']['del_D']}}">
                                                    <input type="hidden" name="setting[del_M]" value="{{$res['list']['setting']['del_M']}}">
                                                    <input type="hidden" name="setting[del_W]" value="{{$res['list']['setting']['del_W']}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group  ">
                                        <label for="execute_del" class="col-sm-2  control-label">删除几天前的备份</label>
                                        <div class="col-sm-8 execute_del_div">
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="1_day" class="minimal setting_execute_del" {{$res['list']['setting']['execute_del'] == '1_day' ? 'checked=""' : ''}} style="position: absolute; opacity: 0;">一天</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="3_day" class="minimal setting_execute_del" {{$res['list']['setting']['execute_del'] == '3_day' ? 'checked=""' : ''}} style="position: absolute; opacity: 0;">三天</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="5_day" class="minimal setting_execute_del" {{$res['list']['setting']['execute_del'] == '5_day' ? 'checked=""' : ''}} style="position: absolute; opacity: 0;">五天</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="1_week" class="minimal setting_execute_del" {{$res['list']['setting']['execute_del'] == '1_week' ? 'checked=""' : ''}} style="position: absolute; opacity: 0;">一周</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="3_week" class="minimal setting_execute_del" {{$res['list']['setting']['execute_del'] == '3_week' ? 'checked=""' : ''}} style="position: absolute; opacity: 0;">三周</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="1_month" class="minimal setting_execute_del" {{$res['list']['setting']['execute_del'] == '1_month' ? 'checked=""' : ''}} style="position: absolute; opacity: 0;">一个月</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="1_quarter" class="minimal setting_execute_del" {{$res['list']['setting']['execute_del'] == '1_quarter' ? 'checked=""' : ''}} style="position: absolute; opacity: 0;">一个季度</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="1_half" class="minimal setting_execute_del" {{$res['list']['setting']['execute_del'] == '1_half' ? 'checked=""' : ''}} style="position: absolute; opacity: 0;">半年</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="1_year" class="minimal setting_execute_del" {{$res['list']['setting']['execute_del'] == '1_year' ? 'checked=""' : ''}} style="position: absolute; opacity: 0;">一年</label></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="margin-top: 0px;"></div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="btn-group pull-right">
                        <button type="submit" class="btn btn-primary">提交</button></div>
                    <div class="btn-group pull-left">
                </div>
            </div>
            <input type="hidden" name="_previous_" value="http://back.cn/admin/configbackups" class="_previous_">
            <!-- /.box-footer --></form>
    </div>
</div>
@endif
<script type="text/javascript">
execute_I = $('input[name="setting[execute_I]"]').val()
execute_H = $('input[name="setting[execute_H]"]').val();
execute_D = $('input[name="setting[execute_D]"]').val();
execute_M = $('input[name="setting[execute_M]"]').val();
execute_W = $('input[name="setting[execute_W]"]').val();
del_I = $('input[name="setting[del_I]"]').val();
del_H = $('input[name="setting[del_H]"]').val();
del_D = $('input[name="setting[del_D]"]').val();
del_M = $('input[name="setting[del_M]"]').val();
del_W = $('input[name="setting[del_W]"]').val();
$(document).ready(function(){
    back_id = '{{$back_id}}';
    if('{{$res["code"]}}' !='200' || '{{empty($res["data"]["list"])}}'){
        layer.msg('{{$res["msg"]}}',{icon:2,time:3000},function(){
            window.location.replace('db_list');
        })
        return false;
    }

    $('.form-horizontal').ajaxForm({
      beforeSubmit: checkForm, 
      success: complete, 
      dataType: 'json'
    });

    function checkForm(){
    }

    function complete(res){
        if(res.code=='200'){
            layer.msg(res.msg,{icon:1,time:2000},function(){
                window.location.replace('db_list');
            })
        }else{
            layer.msg(res.msg,{icon:2,time:3500},function(){
                window.location.replace('db_edit?back_id='+back_id);
            })
        }
    }

    $('.setting_execute_del').iCheck({radioClass:'iradio_minimal-blue'});
    $(".connection").select2({"allowClear":true,"placeholder":{"id":"","text":"\u6307\u5b9a\u8868\u5907\u4efd"}});

    $(".setting_setting_execute").select2({"allowClear":true,"placeholder":{"id":"","text":"\u6307\u5b9a\u8868\u5907\u4efd"}});
    $(".setting_setting_del").select2({"allowClear":true,"placeholder":{"id":"","text":"\u6307\u5b9a\u8868\u5907\u4efd"}});
    setting_execute($(".setting_setting_execute").val());
    setting_del($(".setting_setting_del").val());
    
    $('.setting_setting_execute').on('change',function(){
        var setting_time_val = $(this).val();
        setting_execute(setting_time_val);
    })

    $('.setting_setting_del').on('change',function(){
        var setting_time_val = $(this).val();
        setting_del(setting_time_val);
    })
})
</script>