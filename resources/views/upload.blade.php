<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>  </title>
</head>
<body>
    <input type="hidden" name="token" id="token" value="{{$token}}">

    <div id="container" style="width: 150px;height: 50px;border: 1px solid #ff6666;">
      <a id="pickfiles" href="javascript:void 0;">Upload File</a>
    </div>
    <div style="width: 1000px;height: 20px;border: 1px solid #00ff00">
       <div id="bar" style="width: 0%;background: #00ff00;height: 20px;">
          0%
       </div>
    </div>


  <script src="{{asset('public/js/jquery.js')}}"></script>
  <script src="{{asset('public/js/plupload.full.min.js')}}"></script>
  <script src="{{asset('public/js/qiniu.min.js')}}"></script>

  <script>
    $bar = $('#bar');
    var uploader = Qiniu.uploader({
      runtimes: 'html5,flash,html4',
      browse_button: 'pickfiles',
      container: 'container',
      max_file_size: '1000mb',
//      flash_swf_url: 'bower_components/plupload/js/Moxie.swf',
      dragdrop: true,
      chunk_size: '4mb',
      multi_selection: !(mOxie.Env.OS.toLowerCase()==="ios"),
      uptoken: $('#token').val() ,
      domain: 'http://7xw4k3.com1.z0.glb.clouddn.com/',
      get_new_uptoken: false,
      auto_start: true,
      log_level: 5,
      unique_names: true,
      save_key: true,
      init: {
        'FilesAdded': function(up, files) {
          plupload.each(files, function(file) {
            // 文件添加进队列后,处理相关的事情
            console.log('文件加入队列');
            $bar.text('laoding...');
          });
        },
        'BeforeUpload': function(up, file) {
          // 每个文件上传前,处理相关的事情
          $bar.text('文件开始上传');
        },
        'UploadProgress': function(up, file) {
          // 每个文件上传时,处理相关的事情
          $bar.css('width', file.percent+'%');
          $bar.text(file.percent+'%'+' '+ file.speed/1024 + 'KB/s');
        },
        'FileUploaded': function(up, file, info) {
          // 每个文件上传成功后,处理相关的事情
          // 其中 info 是文件上传成功后，服务端返回的json，形式如
          // {
          //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
          //    "key": "gogopher.jpg"
          //  }
          // 参考http://developer.qiniu.com/docs/v6/api/overview/up/response/simple-response.html

          // var domain = up.getOption('domain');
          // var res = parseJSON(info);
          // var sourceLink = domain + res.key; 获取上传成功后的文件的Url
          $bar.text('完成');
          console.log(info);
        },
        'Error': function(up, err, errTip) {
          //上传出错时,处理相关的事情
        },
        'UploadComplete': function() {
          //队列文件处理完毕后,处理相关的事情
          console.log("队列处理完毕");
//          console.log(up,file,info);
        },
        'Key': function(up, file) {
          // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
          // 该配置必须要在 unique_names: false , save_key: false 时才生效

          var key = "";
          // do something with key here
          return key
        }
      }

    });


  </script>


</body>
</html>