<!doctype html>
<html>
<head>
<title>User Registration</title>
<style>
form {                                         
    margin: 0 auto; 
    width: 600px; 
}
h1
{
color:black;
position:absolute;
top:-3%;
width:100%;
text-align:center;
}
.rg{
background-color:#47e8f7;
border:none;
color:black;
padding:1% 1%;
font-size:150%;
margin:1% 2%;
cursor:pointer;
border-radius:25%;

}
button
{
background-color:white;
border:none;
color:black;
padding:1% 1%;
font-size:150%;
margin:1% 2%;
cursor:pointer;
border-radius:25%;

}
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
</style>
</head>
<body>
<h1>User Registration</h1>
<form action="" method="post">

<h3><label>Username :</label><input type="text" name="user"><br/><br/></h3>
<h3><label>Password:</label><input type="password" name="pass"><br/><br/></h3>
<input type="submit" class="rg" value="Register" name="submit"><br/><br/>
<!-- Login Link -->
<h1><a href="Home.php">Login</a></h1>
</form>
<?php
if(isset($_POST["submit"])){
 if(!empty($_POST['user']) && !empty($_POST['pass'])){
	
 $conn = new mysqli('localhost', 'root', '') or die (mysqli_error()); // DB Connection
 $user = $_POST['user'];
 $pass = $_POST['pass'];
 $db = mysqli_select_db($conn, 'test') or die("DB Error"); // Select DB from database
 //Selecting Database
 $sql = "SELECT * FROM data WHERE user = '$user'";
 $query = mysqli_query($conn, $sql);
 $numrows = mysqli_num_rows($query);
 if($numrows == 0)
 {
 	//Insert to Mysqli Query
	 $sql = "INSERT INTO data (username,password) VALUES ('$user','$pass')";
	 $result = mysqli_query($conn, $sql);

 	//Result Message
	 if($result)
	 {
	 echo "Your Account Created Successfully";
	 }
	 else
	 {
	 echo "That Username already exists! Please try again.";
	 }
 }
 
 }
 else
 {
 ?>
 <!--Javascript Alert -->
 <script>alert('Required all fields');</script>
 <?php
 }
}
?>
</body>
</html>