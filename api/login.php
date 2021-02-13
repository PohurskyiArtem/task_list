<?php
    require "db.php";

    $data = $_POST;
    if( isset($data['login']) )
    {
        $errors = array();
        $userbylogin = R::findOne('users', 'login = ?', array($data['login']));
        $userbyemail = R::findOne('users', 'email = ?', array($data['login']));
        if( $userbylogin )
        {
            $user = $userbylogin;
        } else
        {
            $user = $userbyemail;
        }
        if( $user )
        {
            if( password_verify($data['password'], $user->password) ) 
            {
                setcookie('user_id', $user->id, time()+60*60*24*30, '/');
                setcookie('user_name', $user->login, time()+60*60*24*30, '/');
                    header('Location: ../');
                
                
            } else
            {
                $errors[] = "Неверный пароль!";
            }
        } else
        {
            $errors[] = "Пользователя с таким логином или Email не существует";
        }
        if( !empty($errors) )
        {
            echo '<div style="color: red">' . array_shift($errors) . '</div><hr>';
        }
    }
    echo "<link rel='stylesheet' href='../css/style.min.css'>";
?>

    <div class="login-form">
		<div class="login-form__logo-wrapper">
			<img src="../images/logo-task-list.png" alt="">
		</div>
		<form action="./login.php" method="POST">
			<div class="login-form__input-login">
				<input type="text" placeholder="Login or Email" name="login" value="<?php echo @$data['login'] ?>">
				<img src="../images/profile.png" alt="">
			</div>
			<div class="login-form__input-login">
				<input type="password" placeholder="Password" name="password">
				<img src="../images/icon-lock.svg" alt="">
			</div>
            <div class="signup-link">
                <p>Ещё не зарегистрированы? <a href="./signup.php">Зарегистрироваться!</a></p>
            </div>
			<div class="login-form__button-login">
				<input type="submit" value="Войти">
			</div>	
		</form>
	</div>