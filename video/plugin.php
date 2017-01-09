<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | General Form Elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<header class="main-header">
  <!-- Logo -->
    <a href="../index3.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Video</span>
    </a>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
    <!-- Control Sidebar -->
</header>

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar"> 
        <ul class="sidebar-menu">
            <li><a href="input.html"><i class="fa fa-book"></i><span>配置项</span></a></li>
            <li><a href="package.php"><i class="fa fa-table"></i><span>包管理</span></a></li>
            <li><a href="crawler.php"><i class="fa fa-book"></i><span>爬虫源配置</span></a></li>
            <li><a href="plugin.php"><i class="fa fa-book"></i><span>插件管理</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        插件管理
      </h1>
    </section>

    <section class="content">
      <h4>
        最新插件列表
      </h4>
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <!--
          <div class="box-header with-border">
              <h3 class="box-title">Package Table</h3>
          </div>
          -->
          <div class="box-body">
            <table class="table table-bordered table-hover">
              <thead>
              <tr>
                  <th>id</th>
                  <th>name</th>
                  <th>version name</th>
                  <th>version code</th>
                  <th>download url</th>
                  <th>md5</th>
                  <th>old|new</th>
              </tr>
              </thead>
              <tbody>
                <?php
                    function getData($dest){
                        $ch = curl_init();
                        curl_setopt($ch,CURLOPT_URL,$dest);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        $output = curl_exec($ch);
                        curl_close($ch);
                        return json_decode($output,true);
                    }
                    function showData($data){
                        echo "<tr>";
                        echo "<td>".$data['id']."</td>";
                        echo "<td>".$data['pluginName']."</td>";
                        echo "<td>".$data['versionName']."</td>";
                        echo "<td>".$data['versionCode']."</td>";
                        echo "<td>".$data['downloadUrl']."</td>";
                        echo "<td>".$data['md5']."</td>";
                        echo "<td>".$data['on']."</td>";
                        echo "</tr>";
                    }
                    //$dest = "http://54.169.115.248:8081/pipeline/plugin?type=xtube";
                    //测试用的接口
                    $dest = "http://54.169.115.248:8081/hotube/api/plugin?type=xtube";
                    $output = getData($dest);
                    $output["on"] = "old";
                    showData($output);
                    //var_dump($output);
                    $dest = $dest . "&sign=dafd6a4aab3cf8bc0fd673db12b6806d";
                    $output = getData($dest);
                    $output["on"] = "new";
                    showData($output);
                ?>
            </tbody>
            </table>

          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary box-body">

            <!-- form start -->
            <form role="form" action="/queenbee/plugin" method="post" enctype="multipart/form-data" id="box">

              <label>插件选择</label>
                <select class="form-control" id="form-select" name="form-select">
                  <option value="0" selected>old</option>
                  <option value="1">new</option>
                </select>
              <div class="box-body" id="box-body">
                <div class="form-group">
                  <label for="plugin_name">插件名</label>
                  <input type="text" class="form-control" id="plugin_name" name="plugin_name" placeholder="" value="xtube-plugin-1.0.0.apk">
                </div>
                <div class="form-group">
                  <label for="version">插件版本</label>
                  <input type="text" class="form-control" id="version" name="version" placeholder="" value="xtube_v1.0.0">
                </div>
                <div class="form-group">
                  <label for="type">类型</label>
                  <input type="text" class="form-control" id="type" name="type" placeholder="" value="xtube">
                </div>
                <div class="form-group">
                  <label for="size">size</label>
                  <input type="text" class="form-control" id="size" name="size" placeholder="" value="1000089">
                </div>
                <div class="form-group">
                  <label for="sign">sign</label>
                  <input type="text" class="form-control" id="sign" name="sign" placeholder="" value="dafd6a4aab3cf8bc0fd673db12b6806d">
                </div>
              </div>
                <div class="form-group">
                  <label for="plugin_apk">插件包</label>
                  <input type="file" id="plugin_apk" name="plugin_apk">
                </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
          <!-- /.box -->
  <!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script>

(function($, undefined) {
    var cache = {},     //define autocomplete cache
    //defined the form map
        mapObj =
    {
        '0' : ['plugin_name','version','type','plugin_apk','size'],
        '1' : ['plugin_name','version','type','sign','plugin_apk','size'],
    };

	//display the form by the mapObj
    $("#form-select").on('change', function() {
        var valueType = $(this).val();
        changeFormFileds(valueType);
        $("#form-select").val(valueType);
    });

	function changeFormFileds(valueType) {
        var groupObj = $("#box-body").children(".form-group");
        groupObj.each(function() {
            if ($(this).children("label").attr('for'))
                if ($.inArray($(this).children("label").attr('for'), mapObj[valueType]) == -1) {
                    //这个group不存在于这个表单type中
                    $(this).addClass('hidden');
                }
                else {
                    $(this).removeClass('hidden');
                }
        })
    }
	//初始化表单项
    changeFormFileds(0);
})(jQuery);
</script>
</body>
</body>
</html>
