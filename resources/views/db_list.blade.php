<div class="col-md-12">
    <div class="box">
        <div class="box-header with-border">
            <div class="pull-right">
                <div class="btn-group pull-right grid-create-btn" style="margin-right: 10px">
                    <a href="/admin/backup/db_add" class="btn btn-sm btn-success" title="新增">
                        <i class="fa fa-plus"></i>
                        <span class="hidden-xs">&nbsp;&nbsp;新增</span></a>
                </div>
            </div>
            <div class="pull-left">
                <div class="btn-group" style="margin-right: 5px" data-toggle="buttons">
                    <label class="btn btn-sm btn-dropbox 603709be7a428-filter-btn " title="筛选" onclick="filter_box_click()">
                        <input type="checkbox">
                        <i class="fa fa-filter"></i>
                        <span class="hidden-xs">&nbsp;&nbsp;筛选</span></label>
                </div>
            </div>
        </div>
        <div class="box-header with-border hide" id="filter-box">
            <form action="/admin/backup/db_list" class="form-horizontal" pjax-container="" method="get">
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
                                    <label class="col-sm-2 control-label">标识</label>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <input type="text" class="form-control title" placeholder="请输入标识" name="title" value="{{$param['title']}}"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">数据库地址</label>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <input type="text" class="form-control host" placeholder="请输入数据库地址" name="host" value="{{$param['host']}}"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">数据库名称</label>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <input type="text" class="form-control database" placeholder="请输入数据库名称" name="database" value="{{$param['database']}}"></div>
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
            <table class="table table-hover" id="grid-table603709be5eb49">
                <thead>
                    <tr>
                        <th class="column-id">Id</th>
                        <th class="column-title">标识</th>
                        <th class="column-nickname">项目名</th>
                        <th class="column-connection">数据库类型</th>
                        <th class="column-host">服务器地址</th>
                        <th class="column-port">端口</th>
                        <th class="column-username">账号</th>
                        <th class="column-psw">密码</th>
                        <th class="column-database">库名</th>
                        <th class="column-prefix">表前缀</th>
                        <th class="column-status">状态</th>
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
                        <td class="column-title">{{$v['title']}}</td>
                        <td class="column-nickname">{{$v['nickname']}}</td>
                        <td class="column-connection">{{$v['connection']}}</td>
                        <td class="column-host">{{$v['host']}}</td>
                        <td class="column-port">{{$v['port']}}</td>
                        <td class="column-username">{{$v['username']}}</td>
                        <td class="column-psw">{{$v['psw']}}</td>
                        <td class="column-database">{{$v['database']}}</td>
                        <td class="column-prefix">{{$v['prefix']}}</td>
                        <td class="column-status">
                            @if ($v['status'] == "1")
                                <div class="bootstrap-switch" style="width: 40px;height: 30px;line-height: 30px;text-align: center;background:#337ab7;color:#fff;font-size: 12px;">开启</div>
                            @else
                                <div class="bootstrap-switch" style="width: 40px;height: 30px;line-height: 30px;text-align: center;font-size: 12px;">关闭</div>
                            @endif
                        </td>
                        <td class="column-setting">
                            <pre>"array (<br>'执行说明' => {{api_option_note($v['setting']['setting_execute'])}}<br>'执行间隔' => '{{$v['setting']['execute_I']}} {{$v['setting']['execute_H']}} {{$v['setting']['execute_D']}} {{$v['setting']['execute_M']}} {{$v['setting']['execute_W']}}'<br>'删除执行说明' => {{api_option_note($v['setting']['setting_del'])}}<br>'删除执行间隔' => '{{$v['setting']['del_I']}} {{$v['setting']['del_H']}} {{$v['setting']['del_D']}} {{$v['setting']['del_M']}} {{$v['setting']['del_W']}}'<br>'删除多少天前备份' => '{{$v['setting']['execute_del']}}'<br>'上次执行时间' => '{{$v['setting']['execute_time']}}'<br>)"</pre>
                        </td>
                        <td class="column-created_at">{{$v['created_at']}}</td>
                        <td class="column-updated_at">{{$v['updated_at']}}</td>
                        <td class="column-__actions__">
                            <a href="/admin/backup/db_edit?back_id={{$v['id']}}" class="grid-row-edit">
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
</script>