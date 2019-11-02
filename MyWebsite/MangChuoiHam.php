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
    	width: 500px;
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
			<li><a href="MangChuoiHam/ex1_array.php" target="iframeContent">Bài 1</a></li>
			<li><a href="MangChuoiHam/ex2_array.php" target="iframeContent">Bài 2</a></li>
			<li><a href="MangChuoiHam/ex3_array.php" target="iframeContent">Bài 3</a></li>
			<li><a href="MangChuoiHam/ex4_array.php" target="iframeContent">Bài 4</a></li>
			<li><a href="MangChuoiHam/ex5_array.php" target="iframeContent">Bài 5</a></li>
			<li><a href="MangChuoiHam/ex6_array.php" target="iframeContent">Bài 6</a></li>
			<li><a href="MangChuoiHam/ex7_array.php" target="iframeContent">Bài 7</a></li>
			<li><a href="MangChuoiHam/ex_matrix.php" target="iframeContent">Ma trận</a></li>
		</ul>
	</div>
	<div id="contentForm">
		<iframe src="MangChuoiHam/ex1_array.php" frameborder="0" name="iframeContent"></iframe>
	</div>	
	<div id="clear">
		
	</div>
</div>

<?php include ('footer.html'); ?>