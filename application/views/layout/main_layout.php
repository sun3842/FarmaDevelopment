<html>
<head>

<style>
.maindiv
{
width:950px;
margin:0 auto;
border:1px solid #000;
}
.header
{
float:left;
width:950px;
border:1px solid #000;
height:150px;
}
.section
{
float:left;
width:950px;
border:1px solid #000;
height:auto;
}
.content
{
float:left;
width:750px;
border:1px solid #000;
height:auto;
}
.sidebar
{
float:left;
width:190px;
border:1px solid #000;
height:auto;
}
.footer
{
float:left;
width:950px;
border:1px solid #000;
height:80px;
}

</style>

</head>

<body>


<div class="maindiv">

	<div class="header">	<h3 align="center">header</h3></div>
	<div class="section">


		<div class="content">


            <?php  $this->load->view($content);?>	</div>
		<div class="sidebar">
		
		<ul><li>Menu 1</li><li>Menu 2</li><li>Menu 3</li><li>Menu 4</li><li>Menu 5</li><li>Menu 6</li></ul>
		
		</div>
	
	</div>
	<div class="footer"><h3 align="center">footer</h3></div>
	
	
</div>


</body>
</html>
	