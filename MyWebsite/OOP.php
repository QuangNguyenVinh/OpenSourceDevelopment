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
			<li><a href="OOP/ex1_oop_form.php" target="iframeContent">Bài 1</a></li>
			<li><a href="OOP/ex2_oop_form.php" target="iframeContent">Bài 2</a></li>
		</ul>
	</div>
	<div id="contentForm">
		<iframe src="OOP/ex1_oop_form.php" frameborder="0" name="iframeContent"></iframe>
	</div>	
	<div id="clear">
		
	</div>
</div>

<?php include ('footer.html'); ?>