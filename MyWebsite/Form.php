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
			<li><a href="Form/ex1_form.php" target="iframeContent">Bài 1</a></li>
			<li><a href="Form/ex2_form.php" target="iframeContent">Bài 2</a></li>
			<li><a href="Form/ex3_form.php" target="iframeContent">Bài 3</a></li>
			<li><a href="Form/ex4_form.php" target="iframeContent">Bài 4</a></li>
			<li><a href="Form/ex5_form.php" target="iframeContent">Bài 5</a></li>
			<li><a href="Form/ex6_form.php" target="iframeContent">Bài 6+7</a></li>
			<li><a href="Form/ex8_form.htm" target="iframeContent">Bài 8</a></li>
			<li><a href="Form/ex9_form.php" target="iframeContent">Bài 9</a></li>
		</ul>
	</div>
	<div id="contentForm">
		<iframe src="Form/ex1_form.php" frameborder="0" name="iframeContent"></iframe>
	</div>	
	<div id="clear">
		
	</div>
</div>

<?php include ('footer.html'); ?>