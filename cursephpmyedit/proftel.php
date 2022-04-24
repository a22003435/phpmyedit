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
			session_cache_limiter('nocache');
			session_start();
			echo "<br>"."&nbsp;&nbsp;&nbsp;"."  Bem vindos estudante".'“'.$_SESSION['username'].'”'."Login!"."<br>"."<br>";
			$username=$_SESSION['username'];
			$link=mysqli_connect('localhost','root','root','curse','3306');
			mysqli_set_charset($link,'utf8');
			if (!$link){
    			echo"<script>alert('Falha na conexão do base de dados!')</script>";
			}
			if(isset($_POST['submit'])){
				$tel=$_POST['newtel'];
				if($tel==""){
					echo"<script>alert('Introduz numero Telefone!');window.history.go(-1)</script>";
					exit();
				}
				$result=mysqli_query($link,"update professor set tel=$tel where username=$username");				
				echo"<script>alert('Sucesso!');window.history.go(-1)</script>";
				
			}
			mysqli_close($link);			
		 ?>
		<form name="proftel" id="proftel" method="post">
			<table border="0" cellspacing="0" cellpadding="0"  class="rt">
				<tr>
					<td>Introduz nova numero telefone：</td>
					<td><input type="text" name="newtel" size="20"></td>
					<td><input type="submit" name="submit" value="Change" class="sb"></td>
				</tr>
			</table>			
		</form>	
	</div>
</body>
</html>