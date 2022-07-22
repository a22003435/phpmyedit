<!DOCTYPE html>
<html>
<head>
	<title>Estudante Curso</title>
	<link rel="stylesheet" type="text/css" href="css/estudanteindex">
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
				<li class="estudanteinfo"><a href="estudanteindex.php" class="xx">Estudante Info</a></li>
				<li class="estudantecurso"><a href="estudantecurso.php" class="xx">Inscrever Disciplina</a></li>
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
			session_start();
			echo "<br>"."&nbsp;&nbsp;&nbsp;"."  Bem vindos estudante".'“'.$_SESSION['username'].'”'."Login!"."<br>"."<br>";

			$username=$_SESSION['username'];
			$link=mysqli_connect('localhost','root','root','curse','3306');
			mysqli_set_charset($link,'utf8');
			if (!$link){
    			echo"<script>alert('Falha na conexão do base de dados!')</script>";
			}
			$result1=mysqli_query($link,"select disciplina.ndis, disciplina.dnome, disciplina.curso, professor.nome, professor.apelido from disciplina inner join professor on disciplina.ndis=professor.ndis inner join estudante where estudante.username=$username and disciplina.curso=estudante.ncurso");
			echo "<h2 align='center'>Lista de Disciplinas</h2>";	
			echo "<table align='center' width='450px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>Numero de Disciplina</th><th>Nome de Disciplina</th><th>Curso</th><th>Docente</th></tr>";
			while($row=mysqli_fetch_array($result1)){
				echo "<tr>";
				for($i=0;$i<4;$i++)
				{
            		echo "<td>".$row[$i]."</td>";
        		}
				echo "</tr>";
			}
			echo "</table>";

			if(isset($_POST['xz'])){
			$xk=$_POST['xk'];//ndisciplina
			//adquirir naluno e curso
			$result2=mysqli_query($link,"select naluno , ncurso from estudante where username=$username");
			$data=mysqli_fetch_row($result2);						
			$naluno=$data[0];
			$curso=$data[1];		
			
			$result3=mysqli_query($link,"select * from disciplina where ndis=$xk and curso='$curso'");		
			$result4=mysqli_query($link,"select * from estudantedis where naluno='$naluno' and ndis='$xk'");
			

			if(mysqli_num_rows($result3)==1)
			{
				if(mysqli_num_rows($result4)!=1)
				{
					mysqli_query($link,"insert into estudantedis values ('$naluno','$xk')");
					echo "<script>alert('Disciplina escolhido com sucesso！')</script>";
				}
				else
				{
					echo "<script>alert('Este disciplina ja foi escolhido！')</script>";
				}			
			}
			else
			{
				echo"<script>alert('Introduza o numero de disciplina correto！')</script>";
			}
		}
		mysqli_close($link);
	?>
		 <form name="estudantecurso" id="estudantecurso" method="post">
		 	<table border="0" cellspacing="0" cellpadding="0" class="rt">
		 		<tr>
					<td>Introduza o numero de disciplina：</td>
					<td>
		 				<input type="text" name="xk" id="xk" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			<td><input type="submit" name="xz" value="Escolher" class="sb"></td>
		 		</tr>
		 	</table>
		 </form>			
	</div>
</body>
</html>