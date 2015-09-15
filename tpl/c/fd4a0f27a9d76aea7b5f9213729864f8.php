 <!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="描述不清楚会被百度看不起？">
<meta name="keywords" content="FYSCU,php,框架">
<base href="<?php if(isset($url_root))echo $url_root; ?>" />
<title>让PHP更简单！FYSCU</title>

<!-- Main styles -->
<link href="./tpl/css/site.css" type="text/css" rel="stylesheet">
<!-- 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'> 
 -->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="//cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="//cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>
<body>

<header class="navbar navbar-inverse navbar-fixed-top docs-nav"
	role="banner">
<div class="container">
<div class="navbar-header">
<button class="navbar-toggle" type="button" data-toggle="collapse"
	data-target=".bs-navbar-collapse"><span class="sr-only">Toggle
navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span>
<span class="icon-bar"></span></button>
<a href="#" class="navbar-brand" alt="Less">FYSCU</a></div>
<nav class="collapse navbar-collapse bs-navbar-collapse"
	role="navigation">
<ul class="nav navbar-nav">
	<li><a href="#getting-started">快速开始</a></li>
	<li><a href="#docs">组件文档</a></li>
	<li><a href="#contact">联系我们</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
	<li class="dropdown"><a target="_blank"
		href="http://git.oschina.net/captainblue/fyscu"
		class="dropdown-toggle"><strong>Git</strong></a></li>
	<li><a href="#">关于</a></li>
</ul>
</nav></div>
</header>
<div class="docs-header" id="content">
<div class="container">
<h1>FYSCU,让PHP更简单！</h1>
<?php if($is_dev==1){ ?>
<form action="index.php/index/generator" method="post">
<p>我都造了，不用你教。信不信我分分钟创建一个项目：  <input style="display:inline;width: auto;" type="text" class="form-control"
	placeholder="项目英文名称" name="project"><a>s</a>
	<button  id="add_app" class="btn btn-default btn-sm" type="submit" name="submit" value="1"><span class="glyphicon glyphicon-plus">添加</span></button>
</div>
</p>
</form>
<?php } ?>
</div>
</div>
<div class="banner">
<div class="container">FYSCU 最新版本 <?php if(isset($version['VERSION']))echo $version['VERSION']; ?> - <strong><a>更新时间：<?php if(isset($version['date']))echo $version['date']; ?></a>
</strong></div>
</div>

<div class="container docs-container">
	<div class="row">
		<!-- section start -->
		<div class="col-md-9" role="main">
			<div class="docs-section">
				<div class="page-header">
					<h1 id="getting-started">快速入门</h1>
				</div>
				
				<h3>首先你得</h3>
					<p>1.首先你得有基本的php知识，知道php是做什么的，知道<code>php</code>的运行环境，知道<code>mysql</code>是做什么的，知道<code>html/css</code>的基本原理。好了，这就够了，剩下的实战时查文档就行了。</p>
					<p>2.我希望你已经安装好一切运行环境，包含WEB服务器（<code>apache or nginx</code>），php运行环境（<code>apache-mod or php-fpm</code>），mysql数据库，以及你喜爱的浏览器。</p>
					<p>3.从本站或开源中国下载框架源码，解压后部署到本地服务器。我期待你能通过 <code>http://localhost/fyscu/</code> 来访问本页面。</p>
				<h3>第一个项目</h3>
					<p>1.浏览器打开 <code>http://localhost/fyscu/</code>,我很高兴你已经发现了快速创建项目的向导。（向导？）<br>
					<img alt="fyscu" src="tpl/images/pic001.png">
					</p>	
					<p>2.确保你的web目录下，没有同名的目录，否则你的新项目可能会创建不成功。</p>
					<p>3.如果创建成功，fyscu会在你的web目录下创建新项目需要的文件。至此为止，你可以将你的工作转移到新的目录里去了 ，
					我们来看看目录结构：<img alt="fyscu" src="tpl/images/pic002.png"></p>
					<p>4.简单说一下几个关键的目录：
					
					<br><code>action</code>:你写代码的地方，里面放了所有resource的逻辑实现，我们在<code>控制器</code>章节详细介绍。
					<br><code>config</code>:里面的 <code>global.conf.php</code>是项目的全局配置文件，以数组键值对来存放配置信息。
					<br><code>fyscu</code>:无需多说，框架的核心文件，欢迎有基础的同学修改源码并提出宝贵意见。
					<br><code>tpl</code>:模板目录，放置了展现层相关的<code>htm、css、js、image</code>以及编译后的 输出 结果。
					
					</p>
					
			</div>
		</div>
		<!-- section end -->
		
		<!-- section start -->
		<div class="col-md-9" role="main">
			<div class="docs-section">
				<div class="page-header">
					<h1 id="docs">组件文档</h1>
					<p class="book-mark"><a href="#controller">控制器</a><a href="#database">数据库</a><a href="#template">模板引擎</a><a href="#tool">工具</a><a href="#extra">附录</a></p>
				</div>
				<h3 id="controller">控制器</h3>
					<p><strong>1.URL路由</strong><br>
					说控制器必须说URL路由，这是用户<code>行为输入</code>的依据，所谓的路由就是根据这个这个信息，决定调用哪个<code>处理逻辑</code>来给用户反馈。
					所以，我们首先通过这个例子，了解一下<code>路由信息</code>：
					<pre>
					<br>http://localhost/project_name/index.php/article/list/cid/3
					<br>路由信息 : /article/list/cid/3
					<br>模块(mod): article
					<br>行为(action) : list
					<br>参数(params) ：[cid]=>3
					</pre>
					通过上面路由，我们得到了三个关键信息，<code>mod、action、params</code>，框架会帮你自动收集这些信息。<br>
					它表达的行为是：调用<code>article</code>模块下的 <code>list</code>方法，传入的参数是<code>cid=3</code>,通俗点说就是<strong>把栏目编号为3的文章以列表方式展示出来</strong><br>
					把它翻译成普通的url地址，就是 ： http://localhost/project_name/index.php<code>?mod=article&action=list&cid=3</code>
					</p>
					<p><strong>2.如何实现模块  mod </strong><br>
					接下来我们说说如何实现你的<code>article模块</code>。<br>
					在项目的action目录里新建一个<code>article.class.php</code> （建议复制<code>index.class.php</code>，注意修改代码里的类名为<code>article</code>）
					<br>每一个mod类都继承自 <code>action_base</code>,所以一个新的模块也具备以下特性：
					
					<table class="table table-striped">
					<tr><td>$this->_args</td><td>私有属性</td><td>上面提及到的cid=3等参数会被存放到这里</td></tr>
					<tr><td>$this->beforeAction()</td><td>成员函数</td><td>在执行具体action之前，会<code>自动调用</code>,有需要时请在子类里重载。。</td></tr>
					<tr><td>$this->afterAction()</td><td>成员函数</td><td>在执行具体action之后，会<code>自动调用</code>,有需要时请在子类里重载。。</td></tr>
					</table>
					<div class="tips">(你当前设备不方便观看，请到更大的设备上浏览。)</div>
					</p>
					<p><strong>3.如何编写  action</strong><br>
					action其实只是模块类的一个成员函数，为了能让框架根据路由信息顺利调用函数，必须遵守以下规则：
					<br> 必须是公有<code>public</code>的；命名需要按照<code>action_*</code>格式，比如上面例子
					的 <code>action_list()</code>。这样，你就能在函数里实现你的业务逻辑了。
					<pre>
					<br>例子：
					<br>public function action_list(){
						<br>//在这里实现你的逻辑
					<br>}
					</pre>
					</p>
					<p>
					<strong>4.小结</strong><br>
					控制器部分基本流程就是这样，想了解具体细节，可以看源码。下一节我们会讲解一下实现业务逻辑中
					需要用到的功能组件。
					</p>
				<h3 id="database">操作数据库</h3>
					<p>
					<strong>1.配置文件</strong><br>
					打开全局配置文件 <code>/config/global.conf.php</code>,在<code>组件开关modules</code>选项里将db设为1，这样打开了项目的数据库操作功能，这是大前提。<br>
					然后往下查找  "数据库" ,按照提示修改数据库信息 <code>dsn,username,password等等</code> 
					<img alt="fyscu" src="tpl/images/pic003.png">
					</p>
					<p>
					<strong>2.数据库操作类</strong><br>
					fyscu 提供了一个单例数据库操作类，支持多连接（在配置文件配置），由于是静态方法，全部都通过 <code>FYDB::</code> 来调用
					<br>在开始列出函数文档之前，必须先介绍一个关键的东西，<br> <code>查询选项 $option</code>
					<br>FYDB通过这个选项，更方便地组织查询需要的设置，比如<code>where 、order 、limit</code>等等，更重要的是，这样可以让$option重用、灵活组合。<br>
					$option  是一个数组，下面的它支持的选项:
					<table class="table table-striped">
					<tr><td>where</td><td>查询条件</td><td>例：<code>'where'=>'id>=:i and cid=3'</code>  (注，推荐使用这样的占位符，配合下一条使用)</td></tr>
					<tr><td>data</td><td>占位符绑定的数据，一个数组</td><td>例： <code>'data'=>array(':i'=>2)</code>   (注，这样上面的id就会赋予值2)</td></tr>
					<tr><td>order</td><td>排序依据</td><td>例：<code> 'order'=>'id desc'</code></td></tr>
					<tr><td>limit</td><td>区间与分页</td><td>例：<code> 'limit'=>'20'</code>  或  <code> 'limit'=>'100,10'</code></td></tr>
					</table>
					
					<br>
					<strong>find_all ( $table, $fields=array(), $option=array() )</strong> : 返回一个集合数组
					<table class="table table-striped">
					<tr><td>$table</td><td>数据表名</td><td>例 ：<code> 'article'</code></td></tr>
					<tr><td>$fields</td><td>数组形式的字段集合</td><td>例：<code> array('id','title','content')</code></td></tr>
					<tr><td>$option</td><td>查询的附加选项</td><td>例：<code> array('where'=>'id>1','limit'=>10)</code></td></tr>
					</table>
					
					<br>
					<strong>find_clumn ( $table, $fields=array(), $option=array() )</strong> ： 返回一条查询结果
					<table class="table table-striped">
					<tr><td>$table</td><td>数据表名</td><td>例 ：<code> 'article'</code></td></tr>
					<tr><td>$fields</td><td>数组形式的字段集合</td><td>例：<code> array('id','title','content')</code></td></tr>
					<tr><td>$option</td><td>查询的附加选项</td><td>例：<code> array('where'=>'id=1')</code></td></tr>
					</table>
					
					<br>
					<strong>find_value ( $table, $field, $option=array() )</strong> ：返回查询的值
					<table class="table table-striped">
					<tr><td>$table</td><td>数据表名</td><td>例 ：<code> 'article'</code></td></tr>
					<tr><td>$field</td><td>需要查询的字段或表达式</td><td>例：<code> 'title'</code>或<code>'count(id)'</code></td></tr>
					<tr><td>$option</td><td>查询的附加选项</td><td>例：<code> array('where'=>'id=1')</code></td></tr>
					</table>
					
					<br>
					<strong>insert ( $table, $record=array() )</strong> : 插入一条数据，返回最新自增ID
					<table class="table table-striped">
					<tr><td>$table</td><td>数据表名</td><td>例 ：<code> 'article'</code></td></tr>
					<tr><td>$record</td><td>数组形式的字段=>值，字段名要和数据库一致</td><td>例：<code> array('title'=>'新文章','content'=>'hello fyscu')</code></td></tr>
					</table>
					
					<br>
					<strong>update ( $table, $record=array(), $option=array() )</strong> : 更新已有数据，返回影响行数
					<table class="table table-striped">
					<tr><td>$table</td><td>数据表名</td><td>例 ：<code> 'article'</code></td></tr>
					<tr><td>$record</td><td>数组形式的字段=>值，字段名要和数据库一致</td><td>例：<code> array('title'=>'修改后的标题','content'=>'修改后的内容')</code></td></tr>
					<tr><td>$option</td><td>查询的附加选项</td><td>例：<code> array('where'=>'id=1')</code></td></tr>
					</table>
					
					<br>
					<strong>delete ( $table, $option=array() )</strong> : 删除已有数据，返回影响行数
					<table class="table table-striped">
					<tr><td>$table</td><td>数据表名</td><td>例 ：<code> 'article'</code></td></tr>
					<tr><td>$option</td><td>查询的附加选项</td><td>例：<code> array('where'=>'id=1')</code></td></tr>
					</table>
					<div class="tips">(你当前设备不方便观看，请到更大的设备上浏览。)</div>
					<br>
					<strong>进阶玩法如  <code>原生查询</code>、<code>注册链接</code>、<code>链接热切换</code>操作文档会在近期补充</strong>
					</p>
				<h3 id="template">模板引擎</h3>
					<p>
					<strong>如何渲染页面</strong><br>
					在你的 action 里，调用成员函数 <code>$this->render($tpl,$data)</code> 即可。
					 <table class="table table-striped">
					 <tr><td>$tpl</td><td>模板名，即tpl目录下的文件名(不含扩展名)</td><td>例子：/tpl/index.htm 请填<code>'index'</code> ； /tpl/article/side.html 请填 <code>'article/side'</code></td></tr>
					 <tr><td>$data</td><td>一个数组，可以将业务里的数据传输给页面</td><td>例子： array('t'=>$title,'ct'=>$content),这样页面上就能通过 { $t }、{ $ct }来输出内容 </td></tr>
					 </table>
					 <div class="tips">(你当前设备不方便观看，请到更大的设备上浏览。)</div>
					 不过以上都不是重点，重点是在模板文件中用到的语法。<br>
					 <table class="table table-striped">
					 <tr><td><code><span>{</span>$title<span>}</span></code></td><td>单纯地输出一个变量的值。</td></tr>
					 <tr><td><code><span>{</span>loop $articles $k $v<span>}</span>***<span>{</span>/loop<span>}</span></code></td><td>遍历一个数组，用法相当于php的 foreach。</td></tr>
					 <tr><td><code><span>{</span>if count($articles)>0<span>}</span>***<span>{</span>/if<span>}</span></code></td><td>判断语句，条件的写法兼容php写法。</td></tr>
					 <tr><td><code><span>{</span>subtemplate common/header<span>}</span></code></td><td>子模板，路径请参考render的$tpl参数，你可以藉此切割你的页面，提取公共部分。</td></tr>
					 </table>
					 <div class="tips">(你当前设备不方便观看，请到更大的设备上浏览。)</div>
					</p>
				<h3 id="tool">实用工具</h3>
					<p>
					这是一个精通工具类，提供了些许常用的函数 ，通过 <code>FYTOOL::</code>来调用，下面是几个常用的<br>
					<table class="table table-striped">
					<tr><td>fyscu_info()</td><td>无</td><td>打印当前框架的版本信息</td></tr>
					<tr><td>get_gp_value($key,$method='request')</td><td>$key：http参数名； $method：提交的方法</td><td>返回指定的http参数</td></tr>
					<tr><td><code>debug($arr)</code></td><td>参数：任意变量</td><td>格式化输出变量并中断脚本，调试利器。</td></tr>
					<tr><td>cb_substr($string,$length,$dot='...',$charset='utf-8')</td><td>字符串，长度，尾巴，字符集</td><td>截取定长字符串，用给的尾巴结尾</td></tr>
					<tr><td>FY_ip2long($ip)</td><td>参数：IP地址字符串</td><td>转换成长整型数，修复了原生ip2long溢出的BUG</td></tr>
					
					</table>
					<div class="tips">(你当前设备不方便观看，请到更大的设备上浏览。)</div>
					</p>
				<h3 id="extra">其他</h3>
					<p>
					<strong>一些系统常量</strong><br>
					<code>FYSCU_ROOT</code>:框架根目录，即<code>fyscu.ini.php</code>所在目录。<br>
					<code>ACTION_PATH</code>:业务逻辑类的存放目录，在项目入口文件定义。<br>
					<code>PROJECT_ROOT</code>:项目的根目录，即入口文件<code>index.php</code>所在目录。<br>
					<code>__ENTRANCE__</code>:入口文件的名字，一般为<code>index.php</code>，只在控制器内部用到过。<br>
					<code>PROJECT_NAME</code>:项目名字，创建项目是填的名字。<br>
					</p>
				<h3>扩展阅读</h3>
					<p>windows下WAMP的安装：<a href="http://log.fyscu.com/index.php/archives/80/">http://log.fyscu.com/index.php/archives/80/</a></p>
			</div>
		</div>
		<!-- section end -->
		
		<!-- section start -->
		<div class="col-md-9" role="main">
			<div class="docs-section">
				<div class="page-header">
					<h1 id="contact">联系我</h1>
				</div>
				<p>我的企鹅：<a>540590988</a></p>
				<p>电子邮箱：<a href="mailto:admin@lanhao.name">admin@lanhao.name</a></p>
				<p>个人主页：<a href="http://www.lanhao.name" target="_blank">http://www.lanhao.name</a></p>
				<p>代码仓库：<a href="http://git.oschina.net/captainblue/" target="_blank">http://git.oschina.net/captainblue/</a></p>
			</div>
		</div>
		<!-- section end -->
		<!-- section start -->
	<div class="col-md-9" role="main">
		<div class="docs-section thanks">
			<div class="page-header">
				<h1 id="contact">鸣谢</h1>
			</div>
			
			<div class="person">
				<a target="_blank" href="http://bq.fyscu.com">
				<img alt="471597503" src="http://q1.qlogo.cn/g?b=qq&s=100&nk=471597503">
				<p>小白</p>
				</a>
			</div>
			<div class="person">
				<a target="_blank">
				<img alt="34446703" src="http://q1.qlogo.cn/g?b=qq&s=100&nk=34446703">
				<p>小水</p>
				</a>
			</div>
			
			<div class="person">
				<a target="_blank" href="http://yangguobao.cn">
				<img alt="164773165" src="http://q1.qlogo.cn/g?b=qq&s=100&nk=164773165">
				<p>DSG</p>
				</a>
			</div>
		</div>
	</div>
	<!-- section end -->
	</div>
	<div id="top">↑↑</div>
</div>

<footer class="bs-footer" role="contentinfo">
<div class="container"></div>
</footer>


<script src="./tpl/js/jquery.js"></script>
<script src="./tpl/js/bootstrap.js"></script>
<script>
(function($){
	$(document).scroll(function(){
		if($(document).scrollTop()>200){
			$("#top").fadeIn();
		}else{
			$("#top").fadeOut();
		}
		});
	$("#top").click(function(){
		
		$("html,body").animate({scrollTop:0},500);
	});
})(jQuery);
</script>
</body>
</html>
