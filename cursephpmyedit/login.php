<!DOCTYPE html>
<html>
<head>
	<title>Login_Page</title>
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			background: url(img/backg.jpg) no-repeat;
			background-size: cover ;
			background-position: center center;
			background-attachment: fixed;		
		}
		p{
			font-weight: bolder;
			font-size: 30px;
			margin-left: 105px;
			font-family: "arial";
			color:white;
			text-shadow: 5px 5px 5px black;
		}
		div{
			width: 550px;
			height: 350px;
			margin-top: 160px;
			margin-left: 60px;
			padding-top: 10px;
			background-color:rgba(0,0,0,0.2);
			border-radius: 10px;
		}
		table{
			padding-top:0px;
			padding-left: 70px;
		}
		.t0{
			width:100px;
			display: inline-block;
			margin-bottom: 20px;
			padding-top: 15px;
			color: white;
			text-align: right;
			text-shadow: 5px 5px 5px black;
			font-size: 15px;			
		}
		.t1{
			margin-left:-250px;
			height:24px;
			width:200px;
			margin-top: 15px;
			margin-bottom: 15px;
			border-radius: 3px;
			border:0px;
		}
		.t2{
			border-radius:2px 2px;
			color:white;
			font-family: "arial";
			background-color:rgba(0,0,0,0.5);
			border:0px;
			width:80px;
			height:40px;
			margin-left:40px;
			margin-top:30px;
			font-size: 18px;
			text-shadow: 5px 5px 5px black;
		}
		.t3{
			margin-left: 125px;
		}
		span{
			color:white;
			margin-left: 55px;
			text-shadow: 5px 5px 5px black;
			font-size: 15px;
		}
	</style>
</head>
<body>
	<div>
		<form name="login" id="login" method="post" action="loginfuc.php">
		<table border="0" cellspacing="0" cellpadding="0">
		<p>[Login]</p>
		<tr class='t1'>
    		<td class="t0">Username：</td>
    		<td>
    			<input type="text" placeholder="Introduza o Username" name="username" id="username" class="t1">
    		</td>
    	</tr>
    	<tr>
    		<td class="t0">Password：</td>
    		<td>
    			<input type="password" placeholder="Introduza o password" name="password" id="password" class="t1">
    		</td>
    	</tr>
    	<tr>
    		<td>
    		<span>Escolha o tipo de User：</span>
    		<select name="role" id="role">
			  <option value ="estudante">Estudante</option>
			  <option value ="professor">Professor</option>
			  <option value ="admin">Admin</option>
			</select>
			</td>
    	</tr>
    	<tr>
    		<td colspan="2" align="center" class="t3">
          		<input name="submit" type="submit" value="Login" class="t2">
          		<input name="reset" type="reset" value="Reset" class="t2">
          		<a href="registar"><input type="button" name="zhuce" id="zhuce" class="t2" value="Registar"></a>
        	</td>
    	</tr>  
			</table>
		</form>
	</div>
</body>
</html>