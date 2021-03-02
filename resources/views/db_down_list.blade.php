<div class="col-md-12">
    <div class="box">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-group grid-select-all-btn" style="display:none;margin-right: 5px;">
                    <a class="btn btn-sm btn-default">
                        <span class="hidden-xs selected"></span>
                    </a>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span></button>
                </div>
                <div class="btn-group" style="margin-right: 5px" data-toggle="buttons" onclick="filter_box_click()">
                    <label class="btn btn-sm btn-dropbox 603c9c322266f-filter-btn " title="筛选">
                        <input type="checkbox">
                        <i class="fa fa-filter"></i>
                        <span class="hidden-xs">&nbsp;&nbsp;筛选</span></label>
                </div>
                <meta name="csrf-token" content="X1MKXQkqprRqohlTQFsCYxacyielfY55HDh6S392">
                <div class="btn-group" data-toggle="buttons">
                    <a href="javesricpt:;" type="button" class="btn btn-sm btn-success all_down" style="margin-right: 10px;" data-toggle="modal" data-target="#all_down" date-type="all_down">批量下载</a>
                    <input type="hidden" name="model_down" value="backupfile"></div>
            </div>
        </div>
        <div class="box-header with-border hide" id="filter-box">
            <form action="/admin/backup/db_down_list" class="form-horizontal" pjax-container="" method="get">
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
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">创建时间</label>
                                    <div class="col-sm-8" style="width: 390px">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" id="created_at_start" placeholder="创建时间" name="created_at[start]" value="{{$param['start_time']}}">
                                            <span class="input-group-addon" style="border-left: 0; border-right: 0;">-</span>
                                            <input type="text" class="form-control" id="created_at_end" placeholder="创建时间" name="created_at[end]" value="{{$param['end_time']}}"></div>
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
            <table class="table table-hover" id="grid-table603c9c321cfbc">
                <thead>
                    <tr>
                        <th class="column-__row_selector__">
                            <input type="checkbox" class="grid-select-all" style="position: absolute; opacity: 0;">
                        </th>
                        <th class="column-id">Id</th>
                        <th class="column-nickname">项目ID</th>
                        <th class="column-nickname">项目标识</th>
                        <th class="column-nickname">项目名</th>
                        <th class="column-nickname">项目地址</th>
                        <th class="column-nickname">项目库</th>
                        <th class="column-file_size">文件大小</th>
                        <th class="column-file_name">文件名</th>
                        <th class="column-file">文件地址</th>
                        <th class="column-created_at">备份创建时间</th>
                        <th class="column-down">下载</th>
                    </tr>
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
                        <td class="column-__row_selector__">
                            <input type="checkbox" class="grid-row-checkbox" data-id="{{$v['id']}}" style="position: absolute; opacity: 0;">
                        </td>
                        <td class="column-id">{{$v['id']}}</td>
                        <td class="column-back_id">{{$v['back_id']}}</td>
                        <td class="column-title">{{$v['be_one_back']['title']}}</td>
                        <td class="column-title">{{$v['be_one_back']['nickname']}}</td>
                        <td class="column-title">{{$v['be_one_back']['host']}}</td>
                        <td class="column-title">{{$v['be_one_back']['database']}}</td>
                        <td class="column-file_size">{{$v['size_name']}}</td>
                        <td class="column-file_name">{{$v['file_name']}}</td>
                        <td class="column-file">{{$v['file']}}</td>
                        <td class="column-created_at">{{$v['created_at']}}</td>
                        <td class="column-down">
                            <a href="javascript:;" class="back_down" id="down_{{$v['id']}}" date-id="{{$v['id']}}">下载</a></td>
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
    
    var csrf_token = '{{csrf_token()}}'
    function filter_box_click(){
        if($('#filter-box').is('.hide')){
            $('#filter-box').stop().removeClass('hide');
        }else{
            $('#filter-box').stop().addClass('hide');
        }
    }

    $(document).ready(function(){
        $('#created_at_start').datetimepicker({
            "format": "YYYY-MM-DD HH:mm:ss",
            "locale": "zh-CN"
        });
        $('#created_at_end').datetimepicker({
            "format": "YYYY-MM-DD HH:mm:ss",
            "locale": "zh-CN",
            "useCurrent": false
        });
        $("#created_at_start").on("dp.change",
        function(e) {
            $('#created_at_end').data("DateTimePicker").minDate(e.date);
        });
        $("#created_at_end").on("dp.change",
        function(e) {
            $('#created_at_start').data("DateTimePicker").maxDate(e.date);
        });

        $('.all_down').stop().click(function(){
            var id = Array();
            $(".grid-row-checkbox").each(function(e){
                if($(this).prop('checked')){
                    id.push(($(this).parents().siblings(".column-id").text()).replace(/(^\s*)|(\s*$)/g, ""));
                }
            })
            if(id == ''){
                layer.msg('请选择要下载的文件',{icon:2,time:2000})
            }else{
                $.post("/admin/backup/down",{'_token':csrf_token,"id":id,"is_down":'true','model_down':'backupfile'},function(res){
                    layer.open({
                      type: 1,
                      title: '下载进度页面',
                      shadeClose: true,
                      shade: false,
                      maxmin: true, //开启最大化最小化按钮
                      area: ['70%', '800px'],
                      // content: '/index_down?_token='+csrf_token2+'&id='+id
                      content: res,
                      end:function(){
                        for (var p in arr) {
                            var xhr = arr[p]["xhr"];
                            xhr.abort();
                            layer.msg("所有下载已被取消了！",{icon:0,time:1800})
                        }
                      }
                    });
                })
            }
        })

        $(".back_down").click(function(){
            id = $(this).attr("date-id");
            $.post("/admin/backup/down",{"_token":csrf_token,"id":id,"is_down":"true","model_down":"backupfile"},function(res){
                layer.open({
                  type: 1,
                  title: "下载进度页面",
                  shadeClose: true,
                  shade: false,
                  maxmin: true, //开启最大化最小化按钮
                  area: ["70%", "800px"],
                  content: res,
                  end:function(){
                    for (var p in arr) {
                        var xhr = arr[p]["xhr"];
                        xhr.abort();
                        layer.msg("所有下载已被取消了！",{icon:0,time:1800})
                    }
                    // $(".btn-group .down_win").css("display","block");
                  }
                });
            })
        })
        
        

        $('.grid-row-checkbox').iCheck({
            checkboxClass: 'icheckbox_minimal-blue'
        }).on('ifChanged',
        function() {

            var id = $(this).data('id');

            if (this.checked) {
                $.admin.grid.select(id);
                $(this).closest('tr').css('background-color', '#ffffd5');
            } else {
                $.admin.grid.unselect(id);
                $(this).closest('tr').css('background-color', '');
            }
        }).on('ifClicked',
        function() {

            var id = $(this).data('id');

            if (this.checked) {
                $.admin.grid.unselect(id);
            } else {
                $.admin.grid.select(id);
            }

            var selected = $.admin.grid.selected().length;

            if (selected > 0) {
                $('.grid-select-all-btn').show();
            } else {
                $('.grid-select-all-btn').hide();
            }

            $('.grid-select-all-btn .selected').html("已选择 {n} 项".replace('{n}', selected));
        });

        $('.column-select-submit').on('click',
        function() {

            var defaults = ["id", "title", "nickname", "file_size", "file_name", "file", "created_at", "down", "del"];
            var selected = [];

            $('.column-select-item:checked').each(function() {
                selected.push($(this).val());
            });

            if (selected.length == 0) {
                return;
            }

            var url = new URL(location);

            if (selected.sort().toString() == defaults.sort().toString()) {
                url.searchParams.delete('_columns_');
            } else {
                url.searchParams.set('_columns_', selected.join());
            }

            $.pjax({
                container: '#pjax-container',
                url: url.toString()
            });
        });

        $('.column-select-all').on('click',
        function() {
            $('.column-select-item').iCheck('check');
            return false;
        });

        $('.column-select-item').iCheck({
            checkboxClass: 'icheckbox_minimal-blue'
        });

        $('.grid-select-all').iCheck({
            checkboxClass: 'icheckbox_minimal-blue'
        });

        $('.grid-select-all').on('ifChanged',
        function(event) {
            if (this.checked) {
                $('.grid-row-checkbox').iCheck('check');
            } else {
                $('.grid-row-checkbox').iCheck('uncheck');
            }
        }).on('ifClicked',
        function() {
            if (this.checked) {
                $.admin.grid.selects = {};
            } else {
                $('.grid-row-checkbox').each(function() {
                    var id = $(this).data('id');
                    $.admin.grid.select(id);
                });
            }

            var selected = $.admin.grid.selected().length;

            if (selected > 0) {
                $('.grid-select-all-btn').show();
            } else {
                $('.grid-select-all-btn').hide();
            }

            $('.grid-select-all-btn .selected').html("已选择 {n} 项".replace('{n}', selected));
        });
    })
</script>