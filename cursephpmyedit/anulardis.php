<!DOCTYPE html>
<html>
<head>
	<title>Pesquisa Disciplina</title>
	<link rel="stylesheet" type="text/css" href="css/estudanteindex">
</head>
<body>
	<header>
		<div class="p1">School Management 			
		<input type="button" name="logout" id="logout" value="Log Out" onclick="location.href='logout.php' ">
		</div>        
	</header>
	<div class="left">
		<div class="cd">Menu</div>
		<div id="menu">
			<ul class="box">
				<li class="estudanteinfo"><a href="estudanteindex.php" class="xx">Estudante Info</a></li>
				<li class="estudantecurso"><a href="estudantecurso.php" class="xx">Escolher Disciplina</a></li>
				<li class="consultaAll"><a href="searchcourse.php" class="xx">Pesquisa Disciplina</a></li>
				<li class="anular"><a href="anulardis.php" class="xx">Anular Disciplina</a></li>
				<li class="alterar">
					<a href="#" class="xx">Alterar Profile</p>
					<ul>
						<li><a href="estudanteage.php" class="xx">Alterar Idade</a></li>
						<li><a href="estudantetel.php" class="xx">Alterar Telefone</a></li>
					</ul>
				</li>
				<li class="changepw"><a href="changepw.php" class="xx">Alterar Password</a></li>
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

			$result2=mysqli_query($link,"select naluno from estudante where username=$username");
			$data=mysqli_fetch_row($result2);						
			$naluno=$data[0];

			$result1=mysqli_query($link,"select estudantedis.ndis,disciplina.dnome,professor.nome from estudantedis inner join professor on estudantedis.ndis=professor.ndis inner join disciplina on estudantedis.ndis=disciplina.ndis where estudantedis.naluno=$naluno");
			
			echo "<h2 align='center'>Disciplina Escolhido</h2>";	
			echo "<table align='center' width='400px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>Numero Disciplina</th><th>Nome Disciplina</th><th>Professor Disciplina</th></tr>";
			while($row=mysqli_fetch_array($result1)){			
				echo "<tr>";				
            		for($i=0;$i<3;$i++)
					{
            			echo "<td>".$row[$i]."</td>";
        			}
				echo "</tr>";			
			}
			echo "</table>";

			if(isset($_POST['xz'])){
			$tx=$_POST['tx'];
			$result2=mysqli_query($link,"select naluno, curso from estudante where username=$username");
			$data=mysqli_fetch_row($result2);						
			$sno=$data[0];
			$cmajor=$data[1];
			
			$result3=mysqli_query($link,"select * from estudantedis where ndis='$tx' and naluno='$naluno' ");		
			$result4=mysqli_query($link,"select * from estudantedis where naluno='$naluno' and ndis='$tx' ");
			

			if(mysqli_num_rows($result3)==1)
			{
				if(mysqli_num_rows($result4)==1)
				{
					$result5=mysqli_query($link,"delete from estudantedis where naluno='$naluno' and ndis='$tx'");
					echo "<script>alert('Anular com sucesso!');window.history.go(-1)</script>";
				}
				else
				{
					echo "<script>alert('Este disciplina ja foi anulado!')</script>";
				}
			}
			else
			{
				echo"<script>alert('Introduz o numero de disciplina correto')</script>";
			}
		}
		mysqli_close($link);
	?>
		<form name="stutx" id="stutx" method="post">
		 	<table border="0" cellspacing="0" cellpadding="0" class="rt">
		 		<tr>
					<td>Introduz numero de disciplina</td>
					<td>
		 				<input type="text" name="tx" id="tx" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			<td><input type="submit" name="xz" value="Anular" class="sb"></td>
		 		</tr>		 		
		 	</table>
		 </form>				
	</div>
</body>
</html>