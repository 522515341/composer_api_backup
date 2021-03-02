var csrf_token = '{{csrf_token()}}';
var count = 0;
var redis_icon;
var list;
var down_list;
var max_progress = 0;


// 首先获取所有要下载的数据
function get_down_list(id,type){
    $("#downDiv").find('.file-post-view').html('');
    $.ajax({
        url: "/getDownList",
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
                var file = down_list[p]['file_down'];
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
        html += '<div id="file_'+file_id+'" class="file-item file-item-single down_pre_'+file_id+'" name="fileItem" style="display: block;"><div class="img-box"><img src="../images/file.png"></div>'+div+div2+'<div class="file-line" name="spliter"></div></div>'
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