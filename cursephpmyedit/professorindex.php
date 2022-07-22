<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="css/professorindex">
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
				<li class="profinfo"><a href="professorindex.php" class="xx">Professor Info</a></li>
				<li class="allestudante"><a href="estudante.php" class="xx">Estudantes</a></li>
				<li class="alterar">
					<a href="#" class="xx">Alterar Profile</p>
					<ul>
						<li><a href="profage.php" class="xx">Alterar Idade</a></li>
						<li><a href="proftel.php" class="xx">Alterar Telefone</a></li>
					</ul>
				</li>
				<li class="changepw"><a href="profchangepw.php" class="xx">Alterar Password</a></li>
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
			$result=mysqli_query($link,"select * from professor where username='$username'");			
			echo "<h2 align='center'>Professor Info</h2>";
			echo "<table align='center' width='400px' border='2px' cellpadding='0' cellspacing='0'>";
			while($row=mysqli_fetch_array($result)){
		
					echo "<tr><th>Username</th><th>".$row[0]."</th></tr>";
					echo "<tr><th>Numero Professor</th><th>".$row[1]."</th></tr>";
					echo "<tr><th>Nome</th><th>".$row[2]." ".$row[3]."</th></tr>";
					echo "<tr><th>Sexo</th><th>".$row[4]."</th></tr>";
					echo "<tr><th>Idade</th><th>".$row[5]."</th></tr>";
					echo "<tr><th>Telefone</th><th>".$row[6]."</th></tr>";
					echo "<tr><th>Curso</th><th>".$row[7]."</th></tr>";		
			}
			echo "</table>";
			mysqli_close($link);
		?>
	</div>
</body>
</html>