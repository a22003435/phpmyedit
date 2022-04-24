<!DOCTYPE html>
<html>
<head>
	<title>Registar Professor</title>
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
			height: 580px;
			margin-top: 100px;
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
			width:120px;
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
	</style>
</head>
<body>
	<div>
		<form name="login" id="login" method="post">
		<table border="0" cellspacing="0" cellpadding="0">
		<p>[Professor Registar]</p>
		<tr class='t1'>
    		<td class="t0">Username：</td>
    		<td>
    			<input type="text" placeholder="Introduza o Username" name="username" id="username" class="t1" required="required">
    			<span style="color: rgba(176,0,0);font-size: 24px;">*</span>
    		</td>
    	</tr>
    	<tr>
    		<td class="t0">Numero de professor：</td>
    		<td>
    			<input type="text" placeholder="Introduza o seu numero de professor" name="nProfessor" id="nProfessor" class="t1" required="required">
    			<span style="color: rgba(176,0,0);font-size: 24px;">*</span>
    		</td>
    	</tr>
    	<tr>
    		<td class="t0">nome：</td>
    		<td>
    			<input type="text" placeholder="Introduza o seu nome" name="nome" id="nome" class="t1" required="required">
    			<span style="color: rgba(176,0,0);font-size: 24px;">*</span>
    		</td>
    	</tr>
        <tr>
    		<td class="t0">Apelido：</td>
    		<td>
    			<input type="text" placeholder="Introduza o ultimo nome" name="apelido" id="apelido" class="t1" required="required">
    			<span style="color: rgba(176,0,0);font-size: 24px;">*</span>
    		</td>
    	</tr>
        <tr>
    		<td class="t0">sexo：</td>
    		<td>
                <select id="sexo" name="sexo" class="t1">
                <option value="Homen">Man</option>
                <option value="Mulher">Female</option>
                <span style="color: rgba(176,0,0);font-size: 24px;">*</span>
            </select>
    			
    		</td>
    	</tr>
    	<tr>
    		<td class="t0">password：</td>
    		<td>
    			<input type="password" placeholder="password" name="password1" id="password1" class="t1" required="required">
    			<span style="color: rgba(176,0,0);font-size: 24px;">*</span>
    		</td>
    	</tr>
    	<tr>
    		<td class="t0">re-type Password：</td>
    		<td>
    			<input type="password" placeholder="password" name="password2" id="password2" class="t1" required="required">
    			<span style="color: rgba(176,0,0);font-size: 24px;">*</span>
    		</td>
    	</tr>
    	<tr>
    		<td colspan="2" align="center" class="t3">
          		<input name="registar" type="submit" value="Registar" class="t2">
          		<input name="reset" type="reset" value="Reset" class="t2">
          		<a href="Registar" target="_self"><input type="button" name="return" id="return" class="t2" value="Back"></a>
        	</td>
    	</tr>  
			</table>
		</form>
	</div>
	<?php 
		$link=mysqli_connect('localhost','root','root','curse','3306');
		mysqli_set_charset($link,'utf8');
		if (!$link){
    		echo"<script>alert('Falha na conexão do base de dados!')</script>";
		}else{
			if(isset($_POST['registar']))
			{
				$username=$_POST['username'];
				$nProfessor=$_POST['nProfessor'];
				$nome=$_POST['nome'];
				$apelido=$_POST['apelido'];
				$sexo=$_POST['sexo'];
				$password1=$_POST['password1'];
				$password2=$_POST['password2'];
				$role='professor';
				
				$result0=mysqli_query($link,"select * from user where username='$username'");
				$result1=mysqli_query($link,"select * from professor where username='$username'");
				$result2=mysqli_query($link,"select * from professor where nProfessor='$nProfessor'");

				if($password1==$password2)
				{
					if(mysqli_num_rows($result0) || mysqli_num_rows($result1)==1)
					{
						echo"<script>alert('Utilizador já existe!')</script>";
						exit();	
					}
					else
					{
						
							mysqli_query($link,"insert into professor values ('$username','$nProfessor','$nome','$apelido','$sexo',NULL,NULL,NULL,NULL,NULL)");
							mysqli_query($link,"insert into user values ('$username','$password1','$role')");
							echo"<script>alert('Registar com sucesso！')</script>";
												
					}
				}		
				else
				{
					echo"<script>alert('As senhas digitadas duas vezes são inconsistentes, por favor, digite novamente!')</script>";					
				}
			}
		}
		mysqli_close($link);
	 ?>	
</body>
</html>