<?php
require_once'core/init.php';
if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate=new Validate();
        $validation=$validate->check($_POST, array(
            'username'=>array('required'=>true),
            'password'=>array('required'=>true)
        ));
        if ($validation->passed()) {
            $user=new User();
            $login=$user->login(Input::get('username'),Input::get('password'));
            if ($login) {
                Redirect::to('index.php');
            } else {
                echo '<p> Sorry, login failed. </p>';
            }
            
        }else{
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>

<form action="" method="post">
    
    <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" autocomplete="on">
    </div>
    
    <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" autocomplete="off">
    </div>
    
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="Login">
    
</form>