<!DOCTYPE html>
<html>
<head>
	<title>index estudante</title>
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
			$result=mysqli_query($link,"select * from estudante where username='$username'");
			echo "<h2 align='center'>Estudante Info</h2>";
			echo "<table align='center' width='450px' border='2px' cellpadding='0' cellspacing='0'>";
			while($row=mysqli_fetch_array($result)){	
					echo "<tr><th>Username</th><th>".$row[0]."</th></tr>";					
					echo "<tr><th>Numero de Aluno</th><th>".$row[1]."</th></tr>";					
					echo "<tr><th>Nome</th><th>".$row[2]." ".$row[3]."</th></tr>";
					echo "<tr><th>Sexo</th><th>".$row[4]."</th></tr>";
					echo "<tr><th>Idade</th><th>".$row[5]."</th></tr>";
					echo "<tr><th>Telemovel</th><th>".$row[6]."</th></tr>";
					echo "<tr><th>Curso</th><th>".$row[7]."</th></tr>";			
			}                                                              
			echo "</table>";

			mysqli_close($link);
		 ?>
	</div>
</body>
</html>