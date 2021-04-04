<?php
$isNameValid=true;
$isEmailValid=true;
$isUsernameValid=true;
$isPasswordValid=true;
$isConfirmPasswordValid=true;
$isDateOfBirthValid=true;
$isGenderValid=true;
$isAddressValid=true;
$isCityValid=true;
$isPostalCodeValid=true;
$isHomePhoneValid=true;
$isMobilePhoneValid=true;
$isCreditCardNumberValid=true;
$isCreditCardExpiryDateValid=true;
$isMonthlySalaryValid = true;
$isUrlValid = true;
$isGpaValid = true;

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $confirmPassword=$_REQUEST["confirmPassword"];
    $dateOfBirth = $_REQUEST["dateOfBirth"];
    $gender = $_REQUEST["gender"];
    $address=$_REQUEST["address"];
    $city = $_REQUEST["city"];
    $postalCode = $_REQUEST["postalCode"];
    $homePhone = $_REQUEST["homePhone"];
    $mobilePhone = $_REQUEST["mobilePhone"];
    $creditCardNumber=$_REQUEST["creditCardNumber"];
    $creditCardExpiryDate = $_REQUEST["creditCardExpiryDate"];
    $monthlySalary=$_REQUEST["monthlySalary"];
    $webSiteUrl=$_REQUEST["webSiteUrl"];
    $overallGPA=$_REQUEST["OverallGPA"];


    $isNameValid = preg_match('/^[a-zA-Z]{2,}$/i',$name);
    $isEmailValid = preg_match('/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{1,3}/i',$email);
    $isUsernameValid = preg_match('/^.{5,}$/i',$username);
    $isPasswordValid = preg_match('/^.{8,}$/i',$password);
    if($password == $confirmPassword){ $isConfirmPasswordValid = true;}
    else{  $isConfirmPasswordValid = false; }
    $isDateOfBirthValid = preg_match('/\d{2}\.\d{2}\.\d{4}/i',$dateOfBirth);
    $isGenderValid = preg_match('/^(Male|Female)$/i',$gender);
    $isAddressValid = true;
    $isCityValid = true;
    $isPostalCodeValid = preg_match('/^\d{6}$/i',$postalCode);
    $isHomePhoneValid = preg_match('/^((\d{2}\s\d{7})|(\d{9}))$/i',$homePhone);
    $isMobilePhoneValid = preg_match('/^((\d{2}\s\d{7})|(\d{9}))$/i',$mobilePhone);
    $isCreditCardNumberValid = preg_match('/^\d{16}$/i',$creditCardNumber);
    $isCreditCardExpiryDateValid = preg_match('/^\d{2}\.\d{2}\.\d{4}\$/i',$creditCardExpiryDate);
    $isMonthlySalaryValid = preg_match('/^(UZS)\s\d+\,\d+\.\d+$/i',$monthlySalary);
    $isUrlValid = preg_match('/^https?:\/\/[a-z0-9]+\.[a-zA-Z]{1,3}$/i',$webSiteUrl);
    $isGpaValid = preg_match('/[0-4].[0-9]+$/i',$overallGPA);


    $isValid = $isNameValid && $isEmailValid && $isUsernameValid && $isPasswordValid && $isConfirmPasswordValid
        && $isDateOfBirthValid && $isGenderValid && $isAddressValid && $isCityValid
        && $isPostalCodeValid && $isHomePhoneValid && $isMobilePhoneValid && $isCreditCardNumberValid
        && $isCreditCardExpiryDateValid && $isMonthlySalaryValid && $isUrlValid && $isGpaValid;

    if ($isValid) {
        header('Location: print.php',True,301);
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Validating Forms</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<h1>Registration Form</h1>

<p>
    This form validates user input and then displays "Thank You" page.
</p>

<hr />

<h2>Please, fill below fields correctly</h2>
<form action="index.php" method="POST">
    <dl>
        <dt>Name</dt>
        <dd>
            <input type="text" name="name" placeholder="Name" minlength="2" required>
        </dd>
        <dt>Email</dt>
        <dd>
            <input type="email" name="email" placeholder="Email" required>
        </dd>
        <dt>Username</dt>
        <dd>
            <input type="text" name="username" placeholder="Username" minLength="5" required>
        </dd>
        <dt>Password</dt>
        <dd>
            <input type="password" name="password" placeholder="Password" minLength="8" required>
        </dd>
        <dt>Confirm Password</dt>
        <dd>
            <input type="password" name="confirmPassword" placeholder="Confirm Password" minLength="8" required>
        </dd>
        <dt>Date of Birth</dt>
        <dd>
            <input type="text" name="dateOfBirth" placeholder="dd.MM.yyyy" required>
        </dd>
        <dt>Gender</dt>
        <dd>
            <input type="text" name="gender" placeholder="Male/Female" required>
        </dd>
        <dt>Martial Status</dt>
        <dd>
            <input type="radio" name="martialStatus" value="single">Single
            <input type="radio" name="martialStatus" value="married">Married
            <input type="radio" name="martialStatus" value="divorced">Divorced
            <input type="radio" name="martialStatus" value="widowed">Widowed
        </dd>
        <dt>Address</dt>
        <dd>
            <input type="text" name="address" placeholder="Address" required>
        </dd>
        <dt>City</dt>
        <dd>
            <input type="text" name="city" placeholder="City" required>
        </dd>
        <dt>Postal Code</dt>
        <dd>
            <input type="text" name="postalCode" placeholder="Postal Code" minLength="6" required>
        </dd>
        <dt>Home Phone</dt>
        <dd>
            <input type="text" name="homePhone" placeholder="Home Phone" minLength="9" required>
        </dd>
        <dt>Mobile Phone</dt>
        <dd>
            <input type="text" name="mobilePhone" placeholder="Mobile Phone" minLength="9" required>
        </dd>
        <dt>Credit Card Number</dt>
        <dd>
            <input type="text" name="creditCardNumber" placeholder="Credit Card Number" minLength="16" required>
        </dd>
        <dt>Credit Card Expiry Date</dt>
        <dd>
            <input type="text" name="creditCardExpiryDate" placeholder="dd.MM.yyyy" required>
        </dd>
        <dt>Monthly Salary</dt>
        <dd>
            <input type="text" name="monthlySalary" placeholder="UZS 200,000.00" required>
        </dd>
        <dt>Web Site URL</dt>
        <dd>
            <input type="text" name="webSiteUrl" placeholder="http://github.com" required>
        </dd>
        <dt>Overall GPA</dt>
        <dd>
            <input type="text" name="overallGPA" placeholder="##<=4.5" required>
        </dd>
    </dl>
    <div>
        <input type="submit" value="Register">
    </div>
</form>
</body>
</html>