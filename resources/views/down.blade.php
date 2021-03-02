<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>下载进度页面</title>
    <style type="text/css">
        .sudu_box{
            font: 12px/20px 新宋体;
            height: 20px;
            color: #728089;
            float: right;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            margin-right: 20px;
        }
        .note{float: left;}
        .shengyu,.sudu{float: right;margin-left: 20px;}
        /*body{ font:12px/12px 宋体,新宋体; color:#333333; margin:0; padding:0;}*/
        li{ list-style:none; }
        /*a{ text-decoration:none; color:#004477; }*/
        /*a:hover{ color:#004477; text-decoration:underline; }*/
        .btn-footer{text-decoration: none; color:#244281; cursor:pointer;display:inline-block;height:35px;line-height:35px;padding:0 5px;}
        .btn-footer:hover{text-decoration: none; background-color:#DADADA;}
        /*文件列表框*/
        .downPanel{border: 1px solid #6FBCE2;background-color: #FFFFFF;font:12px/12px 宋体,新宋体;/*防目外部样式破坏*/width: 100%;height:400px;overflow-x:hidden;overflow-y:scroll;}
        div.top-space{margin:3px 0 0 0;}
        .file-post-view{background-color: #FFF;font:12px/12px 宋体,新宋体;/*防目外部样式破坏*/overflow-x:hidden;overflow-y:scroll;}
        /*上传面板*/
        .files-panel{font:12px/12px 宋体;width:100%;height:100%;border:1px solid #ccc;}
        .files-panel .header{ height:31px; line-height:31px; background:#F2F2F2; padding:0 0 0 10px; font-weight:bold;}
        .files-panel .toolbar{height:43px;background:#F2F2F2; line-height:43px; border-bottom:1px solid #ccc;}
        .files-panel .toolbar input{margin:0 0 0 7px; }
        .files-panel .toolbar a.btn{padding:0 10px; height:43px; line-height:43px;cursor:pointer;text-decoration:none;display:inline-block;}
        .files-panel .toolbar a.btn:hover{background-color:#DADADA;padding:0 10px; height:43px; line-height:43px;cursor:pointer;text-decoration:none;display:inline-block;}
        .files-panel .content{ background:#FFF;}
        .files-panel .footer{height:35px; line-height:25px; color:#7A8F99; background:#F2F2F2;}
        /*单文件样式*/
        /*文件名称*/
        .file-item{font:12px/12px 新宋体;background-color: #FFFFFF; height:65px; margin:0;padding:0 0 0 2px;}
        .file-item-single{width:100%;}
        .file-item .name{font:bold 12px/20px 新宋体;width:55%; height:20px; float:left; overflow:hidden; text-overflow: ellipsis;overflow: hidden;white-space: nowrap; vertical-align:middle;}
        /*文件大小*/
        .file-item .size{font:12px/20px 新宋体;height:20px;color:#728089;float:right; text-overflow: ellipsis;overflow: hidden;white-space: nowrap;}
        /*进度百分比*/
        .file-item .percent{font:12px/20px 新宋体;height:20px;float:right;}
        /*进度条边框*/
        .file-item .process-border{margin:0;padding: 0px;border: 1px solid #AAA;clear:both;}
        .file-item .process{ height:12px; background-color: #A5DF16;width:0;/*width:200px;*/}
        /*上传信息*/
        .file-item .msg{color: #7A8F99;margin:8px 0 0 0;}
        /*按钮：取消，暂停，续传*/
        .file-item .Btn,.file-item .Btn:hover{text-decoration: none; color:#244281; cursor:pointer;}
        .file-item .area-l {width:90%; float:left;padding:5px 10px 0 0;}
        .file-item .area-r {float:left;height:100%;}
        .file-item .img-box { width:32px;height:65px;float:left;margin:0 5px 0 0;}
        .file-item .img-box img{ width:32px;height:32px;margin:17px 0 0 0;}
        .file-item .file-head{width:280px; height:20px;overflow:hidden; vertical-align:middle;}
        .file-item .btn-box { width:45px;height:65px;float:left; overflow:hidden; text-align:center; text-decoration:none; vertical-align:middle;line-height:65px;}
        .file-item .btn-box:hover{width:45px;height:65px;background-color:#DADADA;cursor:pointer;text-align:center;text-decoration:none; line-height:65px;}
        .file-item .btn-box img{ width:32px;height:32px;margin:10px 0 0 0;}
        .file-line{background-color: #E3E6EB;overflow: hidden;display: none;height: 1px;}
        .hide{display:none;}
    </style>
</head>
<body >
<div id="downDiv"style="height: 800px;">
    <div class="files-panel" name="down_panel">
        <div class="header" name="down_header">
        下载文件
        <!-- <a class="btn-box" name="cancel" title="取消" href="javascript:;" onclick="xhr_abort()">取消</a> -->
        </div>
        <div class="content_down" name="down_content" style="min-height: calc(100% - 66px);">
            <div name="down_body" class="file-post-view" >
                <div class="file-item file-item-single" name="fileItem" style="display: none">
                    <div class="img-box">
                        <img src="{{$back_host}}/images/file.png">
                    </div>
                    <div class="area-l">
                        <div name="fileName" class="name file_name">HttpUploader程序开发.pdf</div>
                        <div name="percent" class="percent">(35%)</div>
                        <div name="fileSize" class="size" child="1">1000.23MB</div>
                        <div class="process-border">
                            <div name="process" class="process"></div>
                        </div>
                        <div name="msg" class="msg top-space">15.3MB 20KB/S 10:02:00</div>
                    </div>
                </div>
                <div class="file-line" name="spliter"></div>
            </div>
        </div>
        <div class="footer" name="down_footer">
            <a href="javascript:void(0)" class="btn-footer shuoming" name="btnClear"></a>
        </div>
    </div>
</div>

<script type="text/javascript">

is_down = '{{$is_down}}';
model_down = "{{$model_down}}"
if(is_down === 'true'){
    setTimeout(function(){
        id = "{{$id}}";

        get_down_list(id,"one");    
    },1000); 
}else{
    down_win_html();
}

var csrf_token = '{{csrf_token()}}';
var count = 0;
var redis_icon;
var list;
var down_list;
var max_progress = 0;
var file_img='{{$back_host}}/images/file.png';


// 首先获取所有要下载的数据
function get_down_list(id,type){
    $("#downDiv").find('.file-post-view').html('');
    $.ajax({
        url: "/admin/backup/getDownList",
        type:"post",
        data:{'_token':csrf_token,id:id,'model_down':model_down},
        dateType:'json',
    })
    .done(function(res){
        data = res.data
        count = data.count
        redis_icon = data.redis_icon
        down_list = data.down_list
        if(count < 1){
            return false;
        }
        down_html(down_list)
        // 下载
        setTimeout(function(){
            for (var p in down_list) {
                var file_id = down_list[p]['id'];
                var file = down_list[p]['file'];
                var file_name = down_list[p]['file_name'];
                var size_name = down_list[p]['size_name'];
                xhr_http_request(file_id,file,file_name,);
            }
        },500);
        
    })
};

// 列出几个要下载的html
function down_html(list){
    var html = '';
    for (var p in list) {
        var file_id = down_list[p]['id'];
        var file = down_list[p]['file'];
        var file_name = down_list[p]['file_name']
        var size_name = down_list[p]['size_name']
        div2 = '<div class="area-r"><a class="btn-box" name="cancel" title="取消" href="javascript:;" onclick="xhr_abort(\''+file_id+'\')">取消</a></div>'
        div = '<div class="area-l">'
                +'<div class="name file_name">'+file_name+'</div>'
                +'<div class="percent">(0 %)</div><div class="size"><span class="loaded">0KB</span> / '+size_name+'</div>'
                +'<div class="process-border" date-down="0">'
                    +'<div name="process" class="process"></div>'
                +'</div>'
                +'<div name="msg" class="msg top-space">'
                    +'<span class="note">正在下载中</span>'
                    +'<span class="shengyu">剩余时间：计算中</span>'
                    +'<span class="sudu">下载速度：0k/S</span>'
                +'</div>'
              +'</div>'
        html += '<div id="file_'+file_id+'" class="file-item file-item-single down_pre_'+file_id+'" name="fileItem" style="display: block;"><div class="img-box"><img src="'+file_img+'"></div>'+div+div2+'<div class="file-line" name="spliter"></div></div>'
    }           
    $('.file-post-view').html(html);
};

// 通过前端来监听下载进度，
// var xhr;
var arr = [];
function xhr_http_request(pro_id,file,file_name){
    arr[pro_id] = ['xhr','txt_html'];
    // file = 'http://backup.service.weigather.com/upload/backup/goodsmaster/goodsmaster/mysql_2021_01_14_02_02_02_4830.sql';
    var thar = $('#file_'+pro_id)
    var et = 0;
    var fz = 0;
    var sy = 0;
    var la_size = 0;
    var la_time = Number((Date.now() / 1000).toFixed(0))
    var la_time_st = Date.now() // 这里是用来做数字变动的时间
    var la_time_ed = 0 // 这里是用来做数字变动的时间
    
    if(window.XMLHttpRequest){
        thar.xhr = new XMLHttpRequest();
    }else{
        // 兼容IE6 IE5
        thar.xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
        
    // 事件处理
    thar.xhr.onprogress = function(event){
        if(event.lengthComputable){
            if(thar.xhr.status === 200){
                la_time_ed = Date.now();
                et = Number((Date.now() / 1000).toFixed(0));
                t = Number(et - la_time);
                t <= 1 ? t = 1 : t = t;
                la_time = et
                fz = event.loaded;
                fl = fz - la_size;
                la_size = fz
                speed = fl / t;
                sy = event.total - event.loaded
                // 进度 百分比
                percent = (event.loaded / event.total * 100).toFixed(1)
                if(Number(percent) >= 100){
                    $('#file_'+pro_id).find('.percent').html("("+percent+" %)");
                    $('#file_'+pro_id).find('.process').css('width',percent+'%');
                    $('#file_'+pro_id).find('.loaded').html(wangsu(event.loaded));
                    $('#file_'+pro_id).find('.process-border').attr('data-down',100);
                    $('#file_'+pro_id).find('.note').css('color','green').html('文件缓存好啦,正在下载中~~');
                    $('#file_'+pro_id).find('.area-r').css('display','none');

                    // arr[pro_id]['txt_html'] = $('#file_'+pro_id).html();
                }else{
                    if(la_time_ed - la_time_st >=300){
                        la_time_st = la_time_ed;
                        $('#file_'+pro_id).find('.percent').html("("+percent+" %)");
                        $('#file_'+pro_id).find('.process').css('width',percent+'%');
                        $('#file_'+pro_id).find('.loaded').html(wangsu(event.loaded));
                        $('#file_'+pro_id).find('.sudu').html('下载速度：'+wangsu(speed)+'/s')
                        $('#file_'+pro_id).find('.shengyu').html('剩余时间：'+date_time(sy / speed))

                        // arr[pro_id]['txt_html'] = $('#file_'+pro_id).html();
                        // console.log(arr[pro_id]['txt_html'])
                    }
                }
            }
        }
        console.log(
            '【id:'+pro_id+'】【剩余时间：'+date_time(sy / speed)+'】【网速：'+wangsu(speed)+'】【进度：'+wangsu(event.loaded)+'】【总大小：'+wangsu(event.total)+'】'
        );
        console.log('-------------');

    }
    // 上传/下载完成后
    thar.xhr.onload = function (oEvent){
        if (thar.xhr.readyState === 4 && thar.xhr.status === 200) {
            var blob = new Blob([thar.xhr.response]);
            var csvUrl = URL.createObjectURL(blob);
            var link = document.createElement('a');
            link.href = csvUrl;
            link.download = file_name;
            link.click();       

            setTimeout(function(){
                $('#file_'+pro_id).find('.sudu').html('下载速度：0KB/S')
                $('#file_'+pro_id).find('.shengyu').html('剩余时间：0天 0时 0分 0秒')    
                
                arr[pro_id]['txt_html'] = $('#file_'+pro_id).html();
            },300);
        }else{
            console.log("Error",thar.xhr.statusText);
        }
        
    }
    thar.xhr.onerror= function(e) {
        alert("服务器出错错啦 " + file);
    };
    // 发送一个长时间握手的 请求
    thar.xhr.open('GET',file,true);
    thar.xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //hear头
    // thar.xhr.responseType = "blob"; //二进制对象
    thar.xhr.send(null);
    // arr[pro_id]['txt_html'] = $('#file_'+pro_id).html();
    arr[pro_id]['xhr'] = thar.xhr
}

function xhr_abort(pro_id2){
    var thar2 = arr[pro_id2]['xhr']
    if(thar2 != undefined){
        thar2.abort()    
    }
    
    $('#file_'+pro_id2).find('.process').css('background-color','red')
    $('#file_'+pro_id2).find('.note').css('color','red').html('文件已被取消下载！');
    $('#file_'+pro_id2).find('.sudu').html('')
    $('#file_'+pro_id2).find('.shengyu').html('')
    $('#file_'+pro_id2).find('.area-r').css('display','none');

    // arr[pro_id2]['txt_html'] = $('#file_'+pro_id2).html();
}

function wangsu(num){
    if(num >= 1073741824) {
        filesize = Math.round(num / 1073741824 *100) / 100 + 'GB'
    } else if(num >= 1048576) {
        filesize = Math.round(num / 1048576 *100) / 100 + 'MB'
    } else if(num >= 1024) {
        filesize = Math.round(num / 1024 *100) / 100 + 'KB'
    } else {
        filesize = num +' B';
    }
    return filesize;
}


// 关闭隐藏当前窗口，还原的时候就拿出来
// function down_win_html(){
//     if(arr){
//         $('.file-post-view').html('');
//         var html = '';
//         for(var p in arr){

//             var html2 = arr[p]['txt_html'];
//             html += '<div id="file_'+p+'" class="file-item file-item-single down_pre_'+p+'" name="fileItem" style="display: block;">'+html2+'</div>';
//         }
//         $('.file-post-view').html(html);
//     }
// }

function date_time(num){
    num = parseInt(num);
    d = parseInt(num/60/60/24);     //   计算天数
    h = parseInt(num/60/60 %24)     //   计算小时
    m = parseInt(num/60%60);        //   计算分数
    s = parseInt(num%60);           //   计算当前秒数

    return d + '天 ' + h + '时 ' + m + '分 ' + s + '秒';
}
</script>
</body>
</html>