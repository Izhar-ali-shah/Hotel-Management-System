<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=date]
	{
		width: 10%;
  		padding: 10px;
  		margin: 5px 0 22px 0;
		display: block;
		border: none;
  		background: #f1f1f1;

	}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="task1.php" method = "get">
  <div class="container">
    <h1>Student Registration</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

	<label for="Username"><b>Username</b></label>
    <input type="text" placeholder="ENTER a username" name="USER" id="USERNAME" required>

	<label for="Password"><b>Password</b></label>
    <input type="password" placeholder="ENTER YOUR PASSWORD" name="PASS" id="PASSWORD" required>


    <label for="email"><b>STUDENT ID</b></label>
    <input type="text" placeholder="ENTER YOUR ID" name="stdid" id="student_id" required>

    <label for="First name"><b>First name</b></label>
    <input type="text" placeholder="Enter First name" name="first" id="Fist name" required>

    <label for="last name"><b>Last name</b></label>
    <input type="text" placeholder="Enter last name" name="last" id="Last name" required>

	<label for="Address"><b>Phone no</b></label>
    <input type="text" placeholder="Enter phone no" name="Pno" id="phone" required>

	<label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter where you live" name="address" id="add" required>

	<label for="gender"><b>sex</b></label>
    <input type="text" placeholder="Enter gender" name="sex" id="gender" required>

	<label for="year"><b>University year</b></label>
    <input type="text" placeholder="Enter your year" name="year" id="year" required>

	<label for="dob"><b>date of birth</b></label>
    <input type="date" name="dob" id="dob" required>

	<label for="email"><b>student email</b></label>
    <input type="text" placeholder="Enter your email" name="s_email" id="smail" required>

	<label for="room"><b>room no</b></label>
    <input type="text" placeholder="Enter your room num" name="room_id" id="room_id" required>

	<label for="fathers name"><b>father name</b></label>
    <input type="text" placeholder="Enter your fathers name" name="fname" id="fname" >

	<label for="fathers job"><b>father job title</b></label>
    <input type="text" placeholder="Enter your fathers job title" name="fjob" id="fjob" >

	<label for="mothers name"><b>mother name</b></label>
    <input type="text" placeholder="Enter your mothers name" name="mname" id="mname" >

	<label for="mothers job"><b>mother job title</b></label>
    <input type="text" placeholder="Enter your mothers job title" name="mjob" id="mjob">

    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn">Register</button>
  </div>

</form>

</body>
</html>
