@if ($res['code'] != '200' || empty($res['data']['list']))
@else
<div class="col-md-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">创建</h3>
      <div class="box-tools">
      </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="/admin/backup/tables_edit" method="post" class="form-horizontal" >
      <div class="box-body">
        <div class="fields-group">
          <div class="col-md-12">
            <input type="hidden" name="s_back_id" value="{{$res['list']['back_id']}}">
            <input type="hidden" name="s_table_id" value="{{$res['list']['id']}}">
            <div class="form-group  ">
              <label for="title" class="col-sm-2 asterisk control-label">标题</label>
              <div class="col-sm-8">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-pencil fa-fw"></i>
                  </span>
                  <input type="text" id="title" name="title" value="{{$res['list']['title']}}" class="form-control title" placeholder="输入 标题" required="1"></div>
              </div>
            </div>
            <div class="form-group  ">
              <label for="back_id" class="col-sm-2 asterisk control-label">项目库</label>
              <div class="col-sm-8">
                <input type="hidden" name="back_id">
                <select class="form-control back_id select2-hidden-accessible" style="width: 100%;" name="back_id" data-value="" tabindex="-1" aria-hidden="true">
                  <option value=""></option>
                  <option value="{{$db['id']}}" selected="">{{$db['nickname']}}</option>
                  @foreach ($list as $v)
                  <option value="{{$v['id']}}">{{$v['nickname']}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2  control-label"></label>
              <div class="col-sm-8">
                项目库筛选进行了分页获取，请在地址上传入<span style="color:red"> page页码参数</span></div></div>
            <div class="form-group  ">
              <label for="back_type" class="col-sm-2 asterisk control-label">备份类型</label>
              <div class="col-sm-8">
                <input type="hidden" name="back_type">
                <select class="form-control back_type select2-hidden-accessible" style="width: 100%;" name="back_type" data-value="tables_backup" tabindex="-1" aria-hidden="true">
                  <option value=""></option>
                  <option value="tables_backup" {{$res['list']['back_type'] == 'tables_backup' ? 'selected=""' : ''}}>自定表备份</option>
                  <option value="adds_backup" {{$res['list']['back_type'] == 'adds_backup' ? 'selected=""' : ''}}>增量表备份</option>
                  <option value="structure_backup" {{$res['list']['back_type'] == 'structure_backup' ? 'selected=""' : ''}}>表结构备份</option></select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2  control-label"></label>
              <div class="col-sm-8">注意事项：选择
                <span style="color:red">增量表备份</span>类型时，系统将会获取主键以及自增ID，
                <span style="color:red">若不存在主键则不会进行表备份</span><!-- ，并且在
                <span style="color:red">指定表备份中移除</span> --></div>
            </div>
            <div class="form-group  ">
              <label for="type" class="col-sm-2 asterisk control-label">备份逻辑</label>
              <div class="col-sm-8">
                <input type="hidden" name="type">
                <select class="form-control type select2-hidden-accessible" style="width: 100%;" name="type" data-value="1" tabindex="-1" aria-hidden="true">
                  <option value=""></option>
                  <option value="1" {{$res['list']['type'] == '1' ? 'selected=""' : ''}}>合并表备份</option>
                  <option value="2" {{$res['list']['type'] == '2' ? 'selected=""' : ''}}>各自表独立备份</option></select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2  control-label">数据表</label>
              <div class="col-sm-8">
                <a href="javascript:;" class="btn btn-success check_db_data">查看</a></div>
            </div>
            <div class="form-group  ">
              <label for="tables" class="col-sm-2 asterisk control-label">指定表备份</label>
              <div class="col-sm-8">
                <select class="form-control tables select2-hidden-accessible" style="width: 100%;" name="tables[]" multiple="" data-placeholder="输入 指定表备份" data-value="" tabindex="-1" aria-hidden="true">
                  @foreach ($res['list']['tables'] as $v)
                  <option value="{{$v}}" selected="">{{$v}}</option>
                  @endforeach
                </select>
                <input type="hidden" name="tables[]"></div>
            </div>
            <div class="form-group">
              <label class="col-sm-2  control-label"></label>
              <div class="col-sm-8">
                <span style="color:red">选择项目库后</span>，点击查看获取所有表</div></div>
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
                                <input type="text" id="execute_I" name="setting[execute_I]" value="{{$res['list']['setting']['execute_I']}}" class="form-control setting_execute_I" placeholder="请 输入分钟（0-59）">
                                <div class="col-sm-8">
                                    <span style="color:red">请输入 分钟（0-59）</span></div>
                                <input type="text" id="execute_H" name="setting[execute_H]" value="{{$res['list']['setting']['execute_H']}}" class="form-control setting_execute_I" placeholder="输入小时（0-23）">
                                <div class="col-sm-8">
                                    <span style="color:red">请输入 小时（0-23）</span></div>
                                <input type="text" id="execute_D" name="setting[execute_D]" value="{{$res['list']['setting']['execute_D']}}" class="form-control setting_execute_I" placeholder="输入天数（1-31）">
                                <div class="col-sm-8">
                                    <span style="color:red">请输入 天数（1-31）</span></div>
                                <input type="text" id="execute_M" name="setting[execute_M]" value="{{$res['list']['setting']['execute_M']}}" class="form-control setting_execute_I" placeholder="输入月份（1-12）">
                                <div class="col-sm-8">
                                    <span style="color:red">请输入 月份（1-12）</span></div>
                                <input type="text" id="execute_W" name="setting[execute_W]" value="{{$res['list']['setting']['execute_W']}}" class="form-control setting_execute_I" placeholder="输入星期几（0-7），星期天为 0">
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
                                <input type="text" id="del_I" name="setting[del_I]" value="{{$res['list']['setting']['del_I']}}" class="form-control setting_execute_I" placeholder="请 输入分钟（0-59）">
                                <div class="col-sm-8">
                                    <span style="color:red">请输入 分钟（0-59）</span></div>
                                <input type="text" id="del_H" name="setting[del_H]" value="{{$res['list']['setting']['del_H']}}" class="form-control setting_execute_I" placeholder="输入小时（0-23）">
                                <div class="col-sm-8">
                                    <span style="color:red">请输入 小时（0-23）</span></div>
                                <input type="text" id="del_D" name="setting[del_D]" value="{{$res['list']['setting']['del_D']}}" class="form-control setting_execute_I" placeholder="输入天数（1-31）">
                                <div class="col-sm-8">
                                    <span style="color:red">请输入 天数（1-31）</span></div>
                                <input type="text" id="del_M" name="setting[del_M]" value="{{$res['list']['setting']['del_M']}}" class="form-control setting_execute_I" placeholder="输入月份（1-12）">
                                <div class="col-sm-8">
                                    <span style="color:red">请输入 月份（1-12）</span></div>
                                <input type="text" id="del_W" name="setting[del_W]" value="{{$res['list']['setting']['del_W']}}" class="form-control setting_execute_I" placeholder="输入星期几（0-7），星期天为 0">
                                <div class="col-sm-8">
                                    <span style="color:red">请输入 星期几（0-7），星期天为 0</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="form-group  ">
                    <label for="execute_del" class="col-sm-2 asterisk control-label">删除几天前的备份</label>
                    <div class="col-sm-8">
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
var csrf_token = '{{csrf_token()}}'
$(document).ready(function(){
    table_id = '{{$table_id}}';
    if('{{$res["code"]}}' !='200' || '{{empty($res["data"]["list"])}}'){
        layer.msg('{{$res["msg"]}}',{icon:2,time:3000},function(){
            window.location.replace('tables_list');
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
                window.location.replace('tables_list');
            })
        }else{
            layer.msg(res.msg,{icon:2,time:3500},function(){
              window.location.replace('tables_edit?table_id='+table_id);
            })
        }
        
    }

    $('.setting_execute_del').iCheck({radioClass:'iradio_minimal-blue'});
    $(".back_id").select2({"allowClear":true,"placeholder":{"id":"","text":"\u6307\u5b9a\u8868\u5907\u4efd"}});
    $(".back_type").select2({"allowClear":true,"placeholder":{"id":"","text":"\u6307\u5b9a\u8868\u5907\u4efd"}});
    $(".type").select2({"allowClear":true,"placeholder":{"id":"","text":"\u6307\u5b9a\u8868\u5907\u4efd"}});
    $(".tables").select2({"allowClear":true,"placeholder":{"id":"","text":"\u6307\u5b9a\u8868\u5907\u4efd"}});
    
    $('.check_db_data').click(function(){
      back_id = $('select[name="back_id"]').val();
      tables = $('.tables').val()
      $.ajax({
        type:'POST',
        //发送请求的地址
        url:"/admin/backup/tables_db",
        //服务器返回的数据类型
        dataType:'json',
        //发送到服务器的数据，对象必须为key/value的格式，jquery会自动转换为字符串格式
        data:{'back_id':back_id,'_token':csrf_token,'tables':tables,'type':'edit'},
        success:function(res){
          console.log(res)
          if(res.code == '200'){
            $('.tables').html('');
            $('.tables').html(res.data);
          }else{
            layer.msg(res.msg,{icon:2,time:2500})
          }
        },
      })
    })
})
</script>