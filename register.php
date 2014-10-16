<!doctype html>
<html>
<head>
<title>Online Patient Registration</title>
<link href="styles/register.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper" class="page-wrap">
  <header id="top">
<h1>EYE CLINIC<span style="color:blue;font-weight: bold;font-size:16px;float:right;"><br>Go to <a href="index.php">Home</a> page</span></h1>
<h2>Better vision for a better life</h2>
<?php
require_once'core/init.php';
global $error;
global $fail;
if (Input::exists()) {
	if(Token::check(Input::get('token'))){
		$validate=new Validate();
		$validation=$validate->check($_POST, array(
			'firstname'=>array(
				'required'=>true,
			),
			'lastname'=>array(
				'required'=>true,
			),
			'username'=>array(
				'required'=>true,
				'min'=>4,
				'max'=>15,
				'unique'=>'reg_patient'
			),
			'nic'=>array(
				'required'=>true,
			),
			'dob'=>array(
				'required'=>true,
			),
			'email'=>array(
				'required'=>true,
			),
			'mobile'=>array(
				'required'=>true,
			),
			'address'=>array(
				'required'=>true,
			),
			'gender'=>array(
				'required'=>true,
			),
			'password'=>array(
				'required'=>true,
				'min'=>6
			),
			'confirmpassword'=>array(
				'required'=>true,
				'matches'=>'password'
			)
		));
		if ($validation->passed()) {
			$user=new User();
			$salt=Hash::salt(32);
			try {
				$user->create(array(
					'firstname'=>Input::get('firstname'),
					'lastname'=>Input::get('lastname'),
					'username'=>Input::get('username'),
					'nic'=>Input::get('nic'),
					'dob'=>Input::get('dob'),
					'email'=>Input::get('email'),
					'mobile'=>Input::get('mobile'),
					'other'=>Input::get('other'),
					'address'=>Input::get('address'),
					'gender'=>Input::get('gender'),
					'password'=>Hash::make(Input::get('password'), $salt),
					'salt'=>$salt
				));

				Session::flash('home', '<span style="color:green;font-size:16px;">You have been registerd successfully and now can login!</span>');
				Redirect::to('index.php');
			} catch (Exception $e) {
				die($e->getMessage());
			}
		} 
		$error=$validation->errors();
	}
}
?>

<h3>Online Patient Registration</h3>
<form action="" method="post">
	<label>Firstname &nbsp </label>
	<input type="text" name="firstname" id="firstname" value="<?php echo Input::get('firstname'); ?>" autocomplete="off"><?php if (isset($error['firstname']))  echo '<span style="color:red;font-size:17px;">&nbsp&nbsp&nbsp'.$error['firstname'].'</span>'; ?><br><br>
    
    <label>Lastname &nbsp </label>
    <input type="text" name="lastname" id="lastname" value="<?php echo Input::get('lastname'); ?>" autocomplete="off"><?php if (isset($error['lastname']))  echo '<span style="color:red;font-size:17px;">&nbsp&nbsp&nbsp'.$error['lastname'].'</span>'; ?><br><br>

	<label>Username &nbsp </label>
	<input type="text" name="username" id="username" value="<?php if (!isset($error['username'])) echo Input::get('username'); ?>" autocomplete="off"><?php if (isset($error['username']))  echo '<span style="color:red;font-size:17px;">&nbsp&nbsp&nbsp'.$error['username'].'</span>'; ?><br><br>
	
	<label>NIC/Pasport &nbsp </label>
	<input type="text" name="nic" id="nic" value="<?php echo Input::get('nic'); ?>" autocomplete="off"><?php if (isset($error['nic']))  echo '<span style="color:red;font-size:17px;">&nbsp&nbsp&nbsp'.$error['nic'].'</span>'; ?><br><br>
	
	<label>Date of birth &nbsp&nbsp </label>
	<input type="date" name="dob" id="dob" value="<?php echo Input::get('dob'); ?>" autocomplete="off"><?php if (isset($error['dob']))  echo '<span style="color:red;font-size:17px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$error['dob'].'</span>'; ?><br><br>
	
	<label>Email &nbsp&nbsp </label>
	<input type="email" name="email" id="email" value="<?php echo Input::get('email'); ?>" autocomplete="off"><?php if (isset($error['email']))  echo '<span style="color:red;font-size:17px;">&nbsp&nbsp&nbsp'.$error['email'].'</span>'; ?><br><br>
	
	<label>Phone &nbsp&nbsp&nbsp&nbsp </label>
	Mobile &nbsp&nbsp<br>
	<input type="tel" name="mobile" id="mobile" value="<?php echo Input::get('mobile'); ?>" autocomplete="off"><?php if (isset($error['mobile']))  echo '<span style="color:red;font-size:17px;">&nbsp&nbsp&nbsp'.$error['mobile'].'</span>'; ?><br>
	<label>&nbsp</label>
	Other &nbsp&nbsp<br>
	<label>&nbsp</label>
	<input type="tel" name="other" id="other" value="<?php echo Input::get('other'); ?>" autocomplete="off"><br><br>
	
	<label>Address &nbsp&nbsp </label>
	<input type="text" name="address" id="address" value="<?php echo Input::get('address'); ?>" autocomplete="off"><?php if (isset($error['address']))  echo '<span style="color:red;font-size:17px;">&nbsp&nbsp&nbsp'.$error['address'].'</span>'; ?><br><br>
	
	<label>Gender &nbsp&nbsp </label>
	Male 
	<input type="radio" name="gender" value="male" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'male')  echo ' checked="checked"';?> >
	Female 
	<input type="radio" name="gender" value="female" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'female')  echo ' checked="checked"';?> ><?php if (isset($error['gender']))  echo '<span style="color:red;font-size:17px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$error['gender'].'</span>'; ?><br><br>
	
	<label>Password &nbsp&nbsp </label>
	<input name="password" type="password" value=""><?php if (isset($error['password']))  echo '<span style="color:red;font-size:17px;">&nbsp&nbsp&nbsp'.$error['password'].'</span>'; ?><br><br>
	
	<label>Confirm password &nbsp&nbsp </label>
	<input name="confirmpassword" type="password" value=""><?php if (isset($error['confirmpassword']))  echo '<span style="color:red;font-size:17px;">&nbsp&nbsp&nbsp'.$error['confirmpassword'].'</span>'; ?><br><br>
	<label>&nbsp</label>

	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input type="submit" name="submit" value="Register">&nbsp&nbsp
	<input type="reset" value="Cancel">
</form>