<?php 
		session_start();
		$link=mysqli_connect('localhost','root','root','curse','3306');
		mysqli_set_charset($link,'utf8');
		if (!$link){
    		echo"<script>alert('Falha na conexão do base de dados!')</script>";
		}else{
			if(isset($_POST['submit']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				$role=$_POST['role'];

				if($username==""){
					echo"<script>alert('Por favor, insira o username!');window.history.go(-1)</script>";
					exit();
				}else if($password==""){
					echo"<script>alert('Por favor, insira sua password!');window.history.go(-1)</script>";
					exit();
				}

				$result=mysqli_query($link,"select * from user where username='$username' and password='$password' and role='$role'");
				if(mysqli_num_rows($result)==1)
				{
					if($role=="estudante"){
						$_SESSION['username']=$username;
						header("Location:estudanteindex.php");
					}else if($role=="professor")
					{
						$_SESSION['username']=$username;
						header("Location:professorindex.php");
					}else if($role=="admin")
					{
						$_SESSION['username']=$username;
						header("Location:user.php");
					}
				}
				else{
					echo"<script>alert('O username ou passoword está errado, por favor, digite novamente!');window.history.go(-1)</script>";				
				}
			}
		}
		mysqli_close($link);
	 ?>