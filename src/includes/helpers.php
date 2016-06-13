<?php
function str_random($lenght){
     $alphabet = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMONPQRSTUVWXYZ";
     //allow to repeat caracters in token by repeating them
     return substr(str_shuffle(str_repeat($alphabet, $lenght)), 0, $lenght);
     }

function debug($content){
    echo '<pre>';
    print_r($content);
    echo '</pre>';
}


function reconnect_from_cookie(){

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }




    if(isset($_COOKIE['remember']) && !isset($_SESSION['auth'])){
        require_once('config.php');
        //avoid scope issue

        if(!isset($pdo)){
            global $pdo;
        }



        $remember_token = $_COOKIE['remember'];
        $parts = explode('==', $remember_token);
        $user_id = $parts[0];
        $login = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        $login->execute([$user_id]);
        $user = $login->fetch();

        if($user){
                $expected = $user_id.'=='.$user->remember_token.sha1($user_id. 'brunosimon');

                if ($expected == $remember_token){
                    $_SESSION['auth']= $user;
                    setcookie('remember', $remember_token,time() +  60 * 60 *24 *7);
                    //header('Location: /guestbook/index.php');
                    }
        }
        else {
            setcookie('remember', null, -1);
        }
    }
    else{
         setcookie('remember', null, -1);
    }
}
