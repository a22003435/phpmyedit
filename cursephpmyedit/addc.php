<!DOCTYPE html>
<html>
<head>
	<title>Adicionar Disciplina</title>
	<link rel="stylesheet" type="text/css" href="css/adminindex">
</head>
<body>
	<header>
    <div class="p1">School Management 
    <input type="button" name="logout" id="logout" value="Log Out" onclick="location.href='logout.php'">
		</div>
	</header>
    <div class="left">
		<div class="cd">Menu</div>
		<div id="menu">
			<ul class="box">
				<li class="user"><a href="user.php" class="xx">Users</a></li>
				<li class="estudantes"><a href="adminestudantes.php" class="xx">Estudantes</a></li>
				<li class="professor"><a href="professor.php" class="xx">Professores</a></li>			
				<li class="alldis"><a href="disciplina.php" class="xx">Disciplinas</a></li>
				<li class="addc"><a href="addc.php" class="xx">Adicionar Disciplina</a></li>
			</ul>
		</div>
	</div>
	<div class="right">
		<?php 
			session_cache_limiter('nocache');
			session_start();
            echo "<br>"."&nbsp;&nbsp;&nbsp;"."  Bem vindos estudante".'“'.$_SESSION['username'].'”'."Login!"."<br>"."<br>";
			$username=$_SESSION['username'];
			$link=mysqli_connect('localhost','root','root','curse','3306');
			mysqli_set_charset($link,'utf8');
			if (!$link){
    			echo"<script>alert('Falha na conexão do base de dados!')</script>";
			}
			
			if(isset($_POST['add'])){
				$ndis=$_POST['ndis'];
				$dnome=$_POST['dnome'];
				$curso=$_POST['curso'];
				$nprof=$_POST['nprof'];

				$result=mysqli_query($link,"select * from disciplina where ndis='$ndis'");
				$result1=mysqli_query($link,"select * from disciplina where dnome='$dnome'");
				$result2=mysqli_query($link,"select * from professor where nprof='$nprof'");
				$result3=mysqli_query($link,"select * from professor where nprof='$nprof' and dnome is NULL and ndis is NULL ");
				if(mysqli_num_rows($result)!=1)
				{
					if(mysqli_num_rows($result1)!=1)
					{
						if(mysqli_num_rows($result2)==1)
						{
							if(mysqli_num_rows($result3)==1)
							{
								mysqli_query($link,"insert into disciplina values('$ndis','$dnome','$curso')");
								mysqli_query($link,"update professor set dnome='$dnome' where nprof='$nprof'");
								mysqli_query($link,"update t set ndis='$ndis' where nprof='$nprof'");
								echo "<script>alert('Sucesso!')</script>";
							}
							else
							{
								echo "<script>alert('Este professor ja tem disciplina!')</script>";
							}
						}
						else
						{
							echo "<script>alert('Nao existe o professor introduzido')</script>";
						}
					}
					else
					{
						echo "<script>alert('Este disciplina ja existe!')</script>";
					}
				}				
				else
				{
					echo "<script>alert('Numero de disciplina ja existe')</script>";
				}
			}			
			mysqli_close($link);
		?>
		<form name="addc" id="addc" method="post">
		 	<table border="0" cellspacing="0" cellpadding="0" class="rt">
		 		<tr>
					<td>Numero de disciplina：</td>
					<td>
		 				<input type="text" name="ndis" id="ndis" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			
		 		</tr>
		 		<tr>
					<td>Nome de disciplina：</td>
					<td>
		 				<input type="text" name="dnome" id="dnome" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			
		 		</tr>
		 		<tr>
					<td>Curso：</td>
					<td>
		 				<input type="text" name="curso" id="curso" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>		 			
		 		</tr>
		 		<tr>
					<td>Numero de professor：</td>
					<td>
		 				<input type="text" name="nprof" id="nprof" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>		 			
		 		</tr>		 		
		 	</table>
		 	<input type="submit" name="add" value="Submit" class="sb">
		 </form>
	</div>
</body>
</html>