<!DOCTYPE html>
<html>
<head>
	<title>Estudante Idade</title>
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
			if(isset($_POST['submit'])){

				$oldpw=$_POST['oldpw'];
				$newpw1=$_POST['newpw1'];
				$newpw2=$_POST['newpw2'];

				$result1=mysqli_query($link,"select * from user where username='$username' and password='$oldpw' ");

				if(mysqli_num_rows($result1)==1){
					if('$newpw1'=='$oldpw' && '$newpw2'=='$oldpw'){
						echo"<script>alert('Nova Password nao pode ser igual ao antigo!');window.history.go(-1)</script>";
						exit();
					}else{
						if($newpw1==$newpw2){
							$result2=mysqli_query($link,"update user set password='$newpw1' where username='$username' ");
							if($result2==1){
								echo"<script>alert('Sucesso!');window.history.go(-1)</script>";
							}
						}else{
								echo"<script>alert('Password introduzido não é igual!');window.history.go(-1)</script>";
								exit();		
							 }
					}
				}
				else{
					echo"<script>alert('Password antigo errado!');window.history.go(-1)</script>";
					exit();
				}
			}
			mysqli_close($link);			
		 ?>
		<form name="stuxgpw" id="stuxgpw" method="post">
			<table border="0" cellspacing="0" cellpadding="0"  class="rt">
				<tr>
					<td>Old Password:</td>
					<td>
						<input type="password" name="oldpw" size="20" required="required">
						<span style="color: red;font-size: 18px;">*</span>
					</td>
				</tr>
				<tr>
					<td>New Password:</td>
					<td>
						<input type="password" name="newpw1" size="20" required="required">
						<span style="color: red;font-size: 18px;">*</span>
					</td>
				</tr>
				<tr>
					<td>Re-Password:</td>
					<td>
						<input type="password" name="newpw2" size="20" required="required">
						<span style="color: red;font-size: 18px;">*</span>
					</td>
				</tr>
			</table>
			<input type="submit" name="submit" value="Submeter" class="sb">		
		</form>		
	</div>
</body>
</html>