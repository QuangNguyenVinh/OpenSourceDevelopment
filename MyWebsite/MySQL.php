<?php include('header.html');?>
<style type="text/css">
	#menuForm
	{
		float: left;
		width: 25%;
	}
	#menuForm li
	{
		font-size: 18px;
		min-height: 30px;
	}
	#contentForm
	{
		float: left;
		width: 70%;
	}
	#clear
	{
		clear: both;
	}
	iframe 
	{
    	width: 700px;
    	height: 400px;
    	border-width: 5px;
    	border-style: solid;
    	border-radius: 5px;
    	border-color: #a7bdc7;
	}
</style>
<div>
	<br>
	<div id="menuForm">
		<ul>
			<li><a href="MySQL/ex2_1_mysql.php" target="iframeContent">Bài 1 Hiển thị lưới</a></li>
            <li><a href="MySQL/ex2_2_mysql.php" target="iframeContent">Bài 2 Lưới định dạng</a></li>
            <li><a href="MySQL/ex2_3_mysql.php" target="iframeContent">Bài 3 Lưới tùy biến</a></li>
            <li><a href="MySQL/ex2_4_pager_mysql.php" target="iframeContent">Bài 4 Lưới phân trang</a></li>
            <li><a href="MySQL/ex2_5_mysql.php" target="iframeContent">Bài 5 List đơn giản</a></li>
            <li><a href="MySQL/ex2_6_mysql.php" target="iframeContent">Bài 6 List dạng cột</a></li>
            <li><a href="MySQL/ex2_7_mysql.php" target="iframeContent">Bài 7 List dạng cột có link</a></li>
            <li><a href="MySQL/ex2_8_mysql.php" target="iframeContent">Bài 8 List chi tiết có phân trang</a></li>
            <li><a href="MySQL/ex2_9_mysql.php" target="iframeContent">Bài 9 Tìm kiếm đơn giản</a></li>
            <li><a href="MySQL/ex2_10_mysql.php" target="iframeContent">Bài 10 Tìm kiếm nâng cao</a></li>
            <li><a href="MySQL/ex2_11_mysql.php" target="iframeContent">Bài 11 Thêm mới</a></li>
            <li><a href="MySQL/ex2_12_mysql.php" target="iframeContent">Bài 12 Sửa - Xóa</a></li>
            
		</ul>
	</div>
	<div id="contentForm">
		<iframe src="MySQL/ex2_1_mysql.php" frameborder="0" name="iframeContent"></iframe>
	</div>	
	<div id="clear">
		
	</div>
</div>

<?php include ('footer.html'); ?>