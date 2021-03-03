<div class="col-md-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">创建</h3>
      <div class="box-tools">
      </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="/admin/backup/tables_add" method="post" class="form-horizontal" >
      <div class="box-body">
        <div class="fields-group">
          <div class="col-md-12">
            <div class="form-group  ">
              <label for="title" class="col-sm-2 asterisk control-label">标题</label>
              <div class="col-sm-8">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-pencil fa-fw"></i>
                  </span>
                  <input type="text" id="title" name="title" value="" class="form-control title" placeholder="输入 标题" required="1"></div>
              </div>
            </div>
            <div class="form-group  ">
              <label for="back_id" class="col-sm-2 asterisk control-label">项目库</label>
              <div class="col-sm-8">
                <input type="hidden" name="back_id">
                <select class="form-control back_id select2-hidden-accessible" style="width: 100%;" name="back_id" data-value="" tabindex="-1" aria-hidden="true">
                  <option value=""></option>
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
                  <option value="tables_backup" selected="">自定表备份</option>
                  <option value="adds_backup">增量表备份</option>
                  <option value="structure_backup">表结构备份</option></select>
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
                  <option value="1" selected="">合并表备份</option>
                  <option value="2">各自表独立备份</option></select>
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
                                      <option value="minute">N分钟</option>
                                      <option value="hours" selected="">每小时</option>
                                      <option value="n_hours">N小时</option>
                                      <option value="day">每天</option>
                                      <option value="n_day">N天</option>
                                      <option value="month">每月</option>
                                      <option value="n_month">N月</option>
                                  </select>
                              </div>
                              <div class="setting_execute">
                                  <div class="setting_execute_div setting_execute_i">
                                      <input type="text" id="execute_I" name="setting[execute_I]" value="30" class="form-control setting_execute_I" placeholder="输入分钟（0-59）">
                                      <div class="form-control">分</div></div>
                                  <input type="hidden" name="setting[execute_H]" value="1">
                                  <input type="hidden" name="setting[execute_D]" value="3">
                                  <input type="hidden" name="setting[execute_M]" value="1">
                                  <input type="hidden" name="setting[execute_W]" value="1">
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
                                      <option value="minute">N分钟</option>
                                      <option value="hours" selected="">每小时</option>
                                      <option value="n_hours">N小时</option>
                                      <option value="day">每天</option>
                                      <option value="n_day">N天</option>
                                      <option value="month">每月</option>
                                      <option value="n_month">N月</option>
                                  </select>
                              </div>
                              <div class="setting_del">
                                  <div class="setting_del_div setting_del_i">
                                      <input type="text" id="del_I" name="setting[del_I]" value="30" class="form-control setting_del_I" placeholder="输入分钟（0-59）">
                                      <div class="form-control">分</div></div>
                                  <input type="hidden" name="setting[del_H]" value="1">
                                  <input type="hidden" name="setting[del_D]" value="3">
                                  <input type="hidden" name="setting[del_M]" value="1">
                                  <input type="hidden" name="setting[del_W]" value="1"></div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group  ">
                    <label for="execute_del" class="col-sm-2 asterisk control-label">删除几天前的备份</label>
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
var csrf_token = '{{csrf_token()}}'
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
                window.location.replace('tables_list');
            })
        }else{
            layer.msg(res.msg,{icon:2,time:3500})
        }
        
    }

    $('.setting_execute_del').iCheck({radioClass:'iradio_minimal-blue'});
    $(".back_id").select2({"allowClear":true,"placeholder":{"id":"","text":"\u6307\u5b9a\u8868\u5907\u4efd"}});
    $(".back_type").select2({"allowClear":true,"placeholder":{"id":"","text":"\u6307\u5b9a\u8868\u5907\u4efd"}});
    $(".type").select2({"allowClear":true,"placeholder":{"id":"","text":"\u6307\u5b9a\u8868\u5907\u4efd"}});
    $(".tables").select2({"allowClear":true,"placeholder":{"id":"","text":"\u6307\u5b9a\u8868\u5907\u4efd"}});
    
    $('.check_db_data').click(function(){
      back_id = $('select[name="back_id"]').val();

      $.ajax({
        type:'POST',
        //发送请求的地址
        url:"/admin/backup/tables_db",
        //服务器返回的数据类型
        dataType:'json',
        //发送到服务器的数据，对象必须为key/value的格式，jquery会自动转换为字符串格式
        data:{'back_id':back_id,'_token':csrf_token,'type':'add'},
        success:function(res){
          console.log(res)
          if(res.code == '200'){
            $('.tables').html('');
            $('.tables').html(res.data);
          }else{
            layer.msg(res.msg,{icon:2,time:2500})
          }
        }
      })
    });
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