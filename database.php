<!--QUIZZZZZZZ -->
<!--radio=yak wallam wardagret , checkbox=datwanet la yak wallam zyatr warbgret-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>table</title>
</head>
<body background="home.jpg"; style="background-repeat: no-repeat;background-size: 1200px 900px; ">
  <p style="color: red;"><b>personal details</b></p>
  <table>
  <form action="$_post">
    <label for="fname" for="id" >First Name:</label> <input type="text" id="fname" name="fname" autocomplete="off" autofocus required > <br>
    <label for="lname">Last Name:</label> <input type="text" id="lname" name="lname" > <br>
    Enter a date before 2009-01-01:<input type="date"name="bdate"max="2009-01-01"><br>
    Enter a date after 2000-01-01:<input type="date"name="bdate"min="2000-01-01"><br> 
    Quantity (between 1 and 10):<input type="number"name="quantity"min="1"max="10"><br>
    Gender:<input type="radio"name="1"value="Male">Male<input type="radio"name="1"value="Female">Female<br><br>
    <label style=color:red for="fname"><b>Educational Qualification</b></label><br><br>
    <input list="list">
    <datalist id="list">
    <option value=".com">
    <option value=".bcom">
    </datalist><br><br>
    Hobbies:<input type="checkbox" name="playingchees" value="playingchees" id="playingchess"><label for="playingchess" id="playingchees">playingchees</label>
    <input type="checkbox"name="readingbooks" value="readingbooks" id="readingbooks"><label for="readingbooks">Reading books</label><br><br>
    <input type="submit"><br>
    <input type="file" name="pic" accept="image/*">
    <input type="submit"><br>
    Select images: <input type="file" name="img" multiple>
    <input type="submit"><br>
    Password: <input type="password" name="pw" pattern=".{6,}" title="Six or more characters"><br>
    Password: <input type="password" name="pw" pattern =
    "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number
    and one uppercase and lowercase letter, and at least 8 or more characters"><br>
    E-mail:<input type="email" value= "example@example.com"><br>
    <input type="text" name="fname" placeholder="fuck off enter your name"><br>
    <input type="text" name="lname" placeholder="Last name"><br>
    State: <input type="text" name="state" value="Hawler" readonly><br>
  </table>

<form action="/action_page.php">
  <fieldset>
    <legend>Peronal information:</legend>
    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname"><br><br>
    <label for="lname">Last name:</label>
    <input type="text" id="lname" name="lname"><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>
    <label for="birthday">Birthday:</label>
    <input type="date" id="birthday" name="birthday"><br><br>
    <input type="submit" value="Submit">
  </fieldset>
</form>
  </form>
  <ol type="A" start ="28">
    <li>Amir</li>
    <li>Husen</li>
    <li>Fro</li>
  </ol>
</body>
</html>
