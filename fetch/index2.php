<?php
include 'conn.php';
$str = "欢迎 " . $_COOKIE["user"] . "! ";
if (isset($_COOKIE["user"]))
	echo "<script>alert('".$str."');</script>";
else
    echo "<script>alert('请先登录');window.location.href = 'index1.php';</script>";
$sql = "select name,writer,publisher,ISBN,ims from book;";
$res = $conn -> query($sql);
// var_dump($res);
if ($res -> num_rows >0) {
	$rows = array();
	while ($row = $res ->fetch_assoc()) {
		$rows[]=$row;
	}
}else{
	echo "暂无数据";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/index2.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/login.js" ></script>
	<!-- <link rel="stylesheet" type="text/css" href="css/index2.css"> -->
	<title>图书管理系统 - </title>
</head>
<body>
	<div class="home_nav" id="home_nav" style="">
	<nav class="navbar navbar-default">
		<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<a class="navbar-brand " href="/"><h1>图 书 馆</h1></a>
			</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="nav">
					<ul id="global-nav" class="nav navbar-nav  home_top_nav navbar-right">
					<li><a href="javascript:;" id="nav2-event"><?php echo $_COOKIE["user"]; ?></a></li>
					<li><a href="logout.php" id="nav2-product">退出</a></li>
					</ul>
				</div>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	</div>
	<div class="container">
		<div>
			<div class="col-md-9">
				<?php foreach ($rows as $k => $v) { ?>
					<div class="books">
						<div class="tb">
							<h4><?php echo $v["name"]; ?></h4>
							<p>作者：<?php echo $v["writer"]; ?></p>
							<p>出版社：<?php echo $v["publisher"]; ?></p>
							<p>ISBN：<?php echo $v["ISBN"]; ?></p>
						</div>
						<div>
							<img src="upload/<?php echo $v["ims"];?>">
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>