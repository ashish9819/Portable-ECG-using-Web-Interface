<html>
<head>
<style>
body{
background-color:powderblue;


}
form{

margin-left:450px;
background-color:white;
}
table{
font-size:19;
margin-left:70px;
margin-bottom:30px; 
}

form{
padding-left:50px;
padding-right: 50px;
padding-bottom: 50px;

width:320;
height:350;
border:2px solid black;

}
.ip{
border:2px solid black;
border-radius:8px;
width:180px;
height:35;
text-align:center;


}
.sbtn{
width:100px;
height:28x;
border:2px solid black;
border-radius:8px;
font-size:19;

}
</style>

</head>
<body>
<form  action="userregister.php"  method="POST">
<center><h2>REGISTRATION FORM</h2></center>
<table cellspacing="10">
<tr>
<td><p>First Name :</p></td>

<td><input type="text" class="ip" name="firstname" placeholder="Enter first name.." required></td>

</tr>

<tr>
<td><p>Last Name :</p></td>
<td><input type="text" class="ip" name="lastname" placeholder="Enter last name.."  required></td>
</tr>

<tr>
<td><p>Mobile No :</p></td>
<td><input type="number" class="ip" name="mobno" placeholder="Enter Mobile no." required</td>
</tr>

<tr>
<td><p>Email Id :</p></td>
<td><input type="email" class="ip" name="email" placeholder="Enter email id" required</td>
</tr>

<tr>
<td><p>User Nmae :</p></td>
<td><input type="text" class="ip" name="uname" placeholder="Enter user name" required</td>
</tr>

<tr>
<td><p>Password :</p></td>
<td><input type="password" class="ip" name="pwd" placeholder="Enter password" required</td>
</tr>



</table>

<center><input type="submit"  class="sbtn" value="submit"></center>
</form>

</body>

</html>