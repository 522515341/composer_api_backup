<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">创建</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
            <form action="/admin/backup/db_add" method="post" class="form-horizontal">
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
                                    <input type="text" id="title" name="title" value="" class="form-control title" placeholder="输入 标识" required="1"></div>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="nickname" class="col-sm-2 asterisk control-label">项目名</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil fa-fw"></i>
                                    </span>
                                    <input type="text" id="nickname" name="nickname" value="" class="form-control nickname" placeholder="输入 项目名" required="1"></div>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="connection" class="col-sm-2  control-label">数据库类型</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="connection">
                                <select class="form-control connection select2-hidden-accessible" style="width: 100%;" name="connection" data-value="mysql" tabindex="-1" aria-hidden="true">
                                    <option value="mysql" selected="">mysql</option>
                                    <option value="sqlite">sqlite</option>
                                    <option value="pgsql">pgsql</option>
                                    <option value="sqlsrv">sqlsrv</option>
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
                                    <input type="text" id="host" name="host" value="" class="form-control host" placeholder="输入 服务器地址" required="1"></div>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="port" class="col-sm-2 asterisk control-label">端口</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil fa-fw"></i>
                                    </span>
                                    <input type="text" id="port" name="port" value="" class="form-control port" placeholder="输入 端口" required="1"></div>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="username" class="col-sm-2 asterisk control-label">账号</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil fa-fw"></i>
                                    </span>
                                    <input type="text" id="username" name="username" value="" class="form-control username" placeholder="输入 账号" required="1"></div>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="psw" class="col-sm-2  control-label">密码</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-eye-slash fa-fw"></i>
                                    </span>
                                    <input type="password" id="psw" name="psw" value="" class="form-control psw" placeholder="输入 密码"></div>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="database" class="col-sm-2 asterisk control-label">库名</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil fa-fw"></i>
                                    </span>
                                    <input type="text" id="database" name="database" value="" class="form-control database" placeholder="输入 库名" required="1"></div>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="prefix" class="col-sm-2  control-label">表前缀</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil fa-fw"></i>
                                    </span>
                                    <input type="text" id="prefix" name="prefix" value="" class="form-control prefix" placeholder="输入 表前缀"></div>
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
                                            <p style="color:red">注意事项：请按照 linux系统上的 crontab 进行设置！！！</p>
                                            <br>
                                            <p>例子： cron(*/5 * * * *)</p>
                                            <p><span style="color: red">注意：填写 cron(* * * * *) 将不会备份</span></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2  control-label">执行间隔</label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input type="text" id="execute_I" name="setting[execute_I]" value="*" class="form-control setting_execute_I" placeholder="请 输入分钟（0-59）">
                                                    <div class="col-sm-8">
                                                        <span style="color:red">请输入 分钟（0-59）</span></div>
                                                    <input type="text" id="execute_H" name="setting[execute_H]" value="*" class="form-control setting_execute_I" placeholder="输入小时（0-23）">
                                                    <div class="col-sm-8">
                                                        <span style="color:red">请输入 小时（0-23）</span></div>
                                                    <input type="text" id="execute_D" name="setting[execute_D]" value="*" class="form-control setting_execute_I" placeholder="输入天数（1-31）">
                                                    <div class="col-sm-8">
                                                        <span style="color:red">请输入 天数（1-31）</span></div>
                                                    <input type="text" id="execute_M" name="setting[execute_M]" value="*" class="form-control setting_execute_I" placeholder="输入月份（1-12）">
                                                    <div class="col-sm-8">
                                                        <span style="color:red">请输入 月份（1-12）</span></div>
                                                    <input type="text" id="execute_W" name="setting[execute_W]" value="*" class="form-control setting_execute_I" placeholder="输入星期几（0-7），星期天为 0">
                                                    <div class="col-sm-8">
                                                        <span style="color:red">请输入 星期几（0-7），星期天为 0</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2  control-label"></label>
                                        <div class="col-sm-8">
                                            <br>
                                            <p style="border-top:1px solid rgba(0,0,0,0.3);width:100%"></p>
                                            <p style="color:red;">以下是删除备份间隔</p></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2  control-label">删除执行间隔</label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input type="text" id="del_I" name="setting[del_I]" value="*" class="form-control setting_execute_I" placeholder="请 输入分钟（0-59）">
                                                    <div class="col-sm-8">
                                                        <span style="color:red">请输入 分钟（0-59）</span></div>
                                                    <input type="text" id="del_H" name="setting[del_H]" value="*" class="form-control setting_execute_I" placeholder="输入小时（0-23）">
                                                    <div class="col-sm-8">
                                                        <span style="color:red">请输入 小时（0-23）</span></div>
                                                    <input type="text" id="del_D" name="setting[del_D]" value="*" class="form-control setting_execute_I" placeholder="输入天数（1-31）">
                                                    <div class="col-sm-8">
                                                        <span style="color:red">请输入 天数（1-31）</span></div>
                                                    <input type="text" id="del_M" name="setting[del_M]" value="*" class="form-control setting_execute_I" placeholder="输入月份（1-12）">
                                                    <div class="col-sm-8">
                                                        <span style="color:red">请输入 月份（1-12）</span></div>
                                                    <input type="text" id="del_W" name="setting[del_W]" value="*" class="form-control setting_execute_I" placeholder="输入星期几（0-7），星期天为 0">
                                                    <div class="col-sm-8">
                                                        <span style="color:red">请输入 星期几（0-7），星期天为 0</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group  ">
                                        <label for="execute_del" class="col-sm-2  control-label">删除几天前的备份</label>
                                        <div class="col-sm-8">
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="1_day" class="minimal setting_execute_del" style="position: absolute; opacity: 0;">一天</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="3_day" class="minimal setting_execute_del" style="position: absolute; opacity: 0;">三天</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="5_day" class="minimal setting_execute_del" style="position: absolute; opacity: 0;">五天</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="1_week" class="minimal setting_execute_del" style="position: absolute; opacity: 0;">一周</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="3_week" class="minimal setting_execute_del" style="position: absolute; opacity: 0;">三周</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="1_month" class="minimal setting_execute_del" checked style="position: absolute; opacity: 0;">一个月</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="1_quarter" class="minimal setting_execute_del" style="position: absolute; opacity: 0;">一个季度</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="1_half" class="minimal setting_execute_del" style="position: absolute; opacity: 0;">半年</label></span>
                                            <span class="icheck">
                                                <label class="radio-inline">
                                                    <input type="radio" name="setting[execute_del]" value="1_year" class="minimal setting_execute_del" style="position: absolute; opacity: 0;">一年</label></span>
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

<script type="text/javascript">
$(document).ready(function(){
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
                window.location.replace('db_add');
            })
        }
        
    }

    $('.setting_execute_del').iCheck({radioClass:'iradio_minimal-blue'});
    $(".connection").select2({"allowClear":true,"placeholder":{"id":"","text":"\u6307\u5b9a\u8868\u5907\u4efd"}});
})
</script>