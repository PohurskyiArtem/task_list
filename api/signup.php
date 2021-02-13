<?php
    require "db.php";

    //Register new user
    $data = $_POST;
    if( isset($data['do_signup']) )
    {
        //form validate

        $errors = array();
        if( trim($data['login']) == '' )
        {
            $errors[] = 'Введите логин!';
        }

        if( trim($data['email']) == '' )
        {
            $errors[] = 'Введите Email!';
        }

        if( ($data['password']) == '' )
        {
            $errors[] = 'Введите пароль!';
        }

        if( ($data['password_confirm']) != $data['password'] )
        {
            $errors[] = 'Пароли не совпадают!';
        }

        if( R::count( 'users', "login = ?", array($data['login']) ) > 0 )
        {
            $errors[] = 'Пользователь с таким логином уже существует!';
        }
        if( R::count( 'users', "email = ?", array($data['email']) ) > 0 )
        {
            $errors[] = 'Пользователь с таким Email уже существует!';
        }

        if( empty($errors) )
        {
            //cheking errors
            $user = R::dispense('users');
            $user->login = $data['login'];
            $user->email = $data["email"];
            $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
            R::store($user);
            echo '<div style="color: green">Пользователь ' . $data['login'] . ' успешно зарегистрирован!</div><hr>';
        } else
        {
            //render errors
            echo '<div style="color: red; text-align: center">' . array_shift($errors) . '</div><hr>';
        }
    }
    echo "<link rel='stylesheet' href='../css/style.min.css'>";
?>
<div class="signup-form">
		<div class="signup-form__logo-wrapper">
			<img src="../images/logo-task-list.png" alt="">
		</div>
		<form method="POST" action="./signup.php">
			<div class="signup-form__input-login">
				<input type="text" placeholder="Login" name="login" value="<?php echo @$data['login'] ?>">
				<img src="../images/profile.png" alt="">
			</div>
            <div class="signup-form__input-login">
				<input type="email" placeholder="Email" name="email" value="<?php echo @$data['email'] ?>">
				<img src="../images/icon-email.svg" alt="">
			</div>
			<div class="signup-form__input-login">
				<input type="password" placeholder="Password" name="password">
				<img src="../images/icon-lock.svg" alt="">
			</div>
            <div class="signup-form__input-login">
				<input type="password" placeholder="Confirm password" name="password_confirm">
				<img src="../images/icon-lock.svg" alt="">
			</div>
            <div class="login-link">
                <p>Уже зарегистрированы? <a href="./login.php">Войти!</a></p>
            </div>
			<div class="signup-form__button-login">
				<input type="submit" value="Зарегистрироваться" name="do_signup">
			</div>	
		</form>
	</div>