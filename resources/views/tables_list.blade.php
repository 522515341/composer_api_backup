<div class="col-md-12">
    <div class="box">
        <div class="box-header with-border">
            <div class="pull-right">
                <div class="btn-group pull-right grid-create-btn" style="margin-right: 10px">
                    <a href="/admin/backup/tables_add" class="btn btn-sm btn-success" title="新增">
                        <i class="fa fa-plus"></i>
                        <span class="hidden-xs">&nbsp;&nbsp;新增</span></a>
                </div>
            </div>
            <div class="pull-left">
                <div class="btn-group" style="margin-right: 5px" data-toggle="buttons">
                    <label class="btn btn-sm btn-dropbox 6038a27623bf2-filter-btn " title="筛选" onclick="filter_box_click()">
                        <input type="checkbox">
                        <i class="fa fa-filter"></i>
                        <span class="hidden-xs">&nbsp;&nbsp;筛选</span></label>
                </div>
            </div>
        </div>
        <div class="box-header with-border hide" id="filter-box">
            <form action="/admin/backup/tables_list" class="form-horizontal" pjax-container="" method="get">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-body">
                            <div class="fields-group">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">页数</label>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <input type="text" class="form-control page" placeholder="请输入页数" name="page" value="{{$param['page']}}"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">db_list接口的ID</label>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <input type="text" class="form-control back_id" placeholder="请输入db_list接口的ID" name="back_id" value="{{$param['back_id']}}"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">tables_list接口的ID</label>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <input type="text" class="form-control table_id" placeholder="请输入tables_list接口的ID" name="table_id" value="{{$param['table_id']}}"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">备份类型</label>
                                    <div class="col-sm-8">
                                        <select class="form-control back_type select2-hidden-accessible" name="back_type" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <option></option>
                                            <option value="tables_backup" {{$param['back_type'] == 'tables_backup' ? 'selected=""' : ''}}>自定表备份</option>
                                            <option value="adds_backup" {{$param['back_type'] == 'adds_backup' ? 'selected=""' : ''}}>增量表备份</option>
                                            <option value="structure_backup" {{$param['back_type'] == 'structure_backup' ? 'selected=""' : ''}}>表结构备份</option></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="btn-group pull-left">
                                    <button class="btn btn-info submit btn-sm">
                                        <i class="fa fa-search"></i>&nbsp;&nbsp;搜索</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover" id="grid-table6038a2761e485">
                <thead>
                    <tr>
                        <th class="column-id">Id</th>
                        <th class="column-back_id">库备份Id</th>
                        <th class="column-title">标题</th>
                        <th class="column-status">状态</th>
                        <th class="column-back_type">备份类型</th>
                        <th class="column-type">备份逻辑</th>
                        <th class="column-lists">数据表</th>
                        <th class="column-setting">备份配置</th>
                        <th class="column-created_at">创建时间</th>
                        <th class="column-updated_at">修改时间</th>
                        <th class="column-__actions__">操作</th></tr>
                </thead>
                <tbody>
                    @if ($res['code'] != "200" || empty($res['data']['list']))
                    <tr>
                        <td colspan="13" style="padding: 100px;text-align: center;color: #999999">
                            <svg t="1562312016538" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2076" width="128" height="128" style="fill: #e9e9e9;">
                                <path d="M512.8 198.5c12.2 0 22-9.8 22-22v-90c0-12.2-9.8-22-22-22s-22 9.8-22 22v90c0 12.2 9.9 22 22 22zM307 247.8c8.6 8.6 22.5 8.6 31.1 0 8.6-8.6 8.6-22.5 0-31.1L274.5 153c-8.6-8.6-22.5-8.6-31.1 0-8.6 8.6-8.6 22.5 0 31.1l63.6 63.7zM683.9 247.8c8.6 8.6 22.5 8.6 31.1 0l63.6-63.6c8.6-8.6 8.6-22.5 0-31.1-8.6-8.6-22.5-8.6-31.1 0l-63.6 63.6c-8.6 8.6-8.6 22.5 0 31.1zM927 679.9l-53.9-234.2c-2.8-9.9-4.9-20-6.9-30.1-3.7-18.2-19.9-31.9-39.2-31.9H197c-19.9 0-36.4 14.5-39.5 33.5-1 6.3-2.2 12.5-3.9 18.7L97 679.9v239.6c0 22.1 17.9 40 40 40h750c22.1 0 40-17.9 40-40V679.9z m-315-40c0 55.2-44.8 100-100 100s-100-44.8-100-100H149.6l42.5-193.3c2.4-8.5 3.8-16.7 4.8-22.9h630c2.2 11 4.5 21.8 7.6 32.7l39.8 183.5H612z" p-id="2077"></path>
                                <p class="msg">code码：{{$res['code']}}</p>
                                <p class="msg">请求时间：{{$res['date_time']}}</p>
                                <p class="msg">请求结果：{{$res['msg']}}</p>
                            </svg>
                        </td>
                    </tr>
                    @else
                    @foreach ($res['data']['list'] as $v)
                    <tr>
                        <td class="column-id">{{$v['id']}}</td>
                        <td class="column-back_id">{{$v['back_id']}}</td>
                        <td class="column-title">{{$v['title']}}</td>
                        <td class="column-status">
                            @if ($v['status'] == "1")
                                <div class="bootstrap-switch" style="width: 40px;height: 30px;line-height: 30px;text-align: center;background:#337ab7;color:#fff;font-size: 12px;">开启</div>
                            @else
                                <div class="bootstrap-switch" style="width: 40px;height: 30px;line-height: 30px;text-align: center;font-size: 12px;">关闭</div>
                            @endif
                        </td>
                        <td class="column-back_type">{{$v['back_type'] == 'tables_backup' ? '自定表备份' : ($v['back_type'] == 'adds_backup' ? '增量表备份' : '表结构备份')}}</td>
                        <td class="column-type">{{$v['type'] == 1 ? '统一合并备份' : '各自独立备份'}}</td>
                        <td class="column-lists">
                            <span class="grid-expand" data-toggle="modal" data-target="#grid-modal-{{$v['id']}}-lists">
                                <a href="javascript:void(0)">
                                    <i class="fa fa-clone"></i>&nbsp;&nbsp;查看</a>
                            </span>
                            <div class="modal" id="grid-modal-{{$v['id']}}-lists" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">数据表列表</h4></div>
                                        <div class="modal-body">
                                            <table class="table ">
                                                @if ($v['back_type'] == 'adds_backup')
                                                <thead>
                                                    <tr>
                                                        <th>表名</th>
                                                        <th>主键</th>
                                                        <th>上个自增ID</th>
                                                        <th>类型</th></tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($v['inc_val'] as $v2)
                                                    <tr>
                                                        <td>{{$v2['table']}}</td>
                                                        <td>{{$v2['primarykey']}}</td>
                                                        <td>{{$v2['autoincrement']}}</td>
                                                        <td>{{$v2['autoincrement']}}</td>
                                                        <td>
                                                            @if ($v2['type'] == '1')
                                                            <span style="color:green">执行备份</span>
                                                            @else
                                                            <span style="color:red">不执行备份</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                @else
                                                <thead>
                                                    <tr>
                                                        <th>表名</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($v['tables'] as $v2)
                                                    <tr>
                                                        <td>{{$v2}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="column-setting">
                            <pre>"array (<br>'执行间隔' => '{{$v['setting']['execute_I']}} {{$v['setting']['execute_H']}} {{$v['setting']['execute_D']}} {{$v['setting']['execute_M']}} {{$v['setting']['execute_W']}}'<br>'删除执行间隔' => '{{$v['setting']['del_I']}} {{$v['setting']['del_H']}} {{$v['setting']['del_D']}} {{$v['setting']['del_M']}} {{$v['setting']['del_W']}}'<br>'删除多少天前备份' => '{{$v['setting']['execute_del']}}'<br>'上次执行时间' => '{{$v['setting']['execute_time']}}'<br>)"</pre>
                        </td>
                        <td class="column-created_at">{{$v['created_at']}}</td>
                        <td class="column-updated_at">{{$v['updated_at']}}</td>
                        <td class="column-__actions__">
                            <a href="/admin/backup/tables_edit?table_id={{$v['id']}}" class="grid-row-edit">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @endif                
                </tbody>
            </table>
        </div>
        @if ($res['code'] != "200")
        <div class="box-footer clearfix">
            总页数<b> 0</b> / 总共<b> 0条</b> / 当前页数 <b>0</b>
            <label class="control-label pull-right" style="margin-right: 10px; font-weight: 100;">
                <small>显示</small>&nbsp;0条
            </label>
        </div>
        @else
        <div class="box-footer clearfix">
            总页数<b> {{$res['data']['page']}}</b> / 总共<b> {{$res['data']['count']}}条</b>
            <label class="control-label pull-right" style="margin-right: 10px; font-weight: 100;">
                <small>显示</small>&nbsp;{{$res['data']['num']}}条 | 当前页数:{{$res['data']['current_page']}}页
            </label>
        </div>
        @endif
        <!-- /.box-body --></div>
</div>
<script type="text/javascript">
    function filter_box_click(){
        if($('#filter-box').is('.hide')){
            $('#filter-box').stop().removeClass('hide');
        }else{
            $('#filter-box').stop().addClass('hide');
        }
    }

    $(document).ready(function(){
        $(".back_type").select2({
          placeholder: {"id":"","text":"\u9009\u62e9"},
          "allowClear":true
        });
    })
</script>