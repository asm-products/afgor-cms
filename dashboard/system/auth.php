<?php
$lifetime = 600;

if(session_id() == '') {
    session_start();
    setcookie(session_name(), session_id(), time()+$lifetime);
}

function startSys() {   
    
    if ((int)htmlspecialchars($_GET["signout"]) == 1 && ((isset($_COOKIE['member_name']) && isset($_COOKIE['member_pass'])) || (isset($_SESSION['member_name']) && isset($_SESSION['member_pass'])))) {
        simple_logout();
        return 3;
    } else if ($_POST['username'] && $_POST['password']) {
        if (check_login($_POST['username'], MD5($_POST['password']))) {
            simple_login($_POST['username'], $_POST['password']);
            return 1;
        } else {
            return 0;
        }
    } else if ($_POST['username'] || $_POST['password']) {
        return 2;
    } else if ($_COOKIE['member_name'] && $_COOKIE['member_pass'] && check_login($_COOKIE['member_name'], $_COOKIE['member_pass'])) {
        return 1;
    } else if ($_SESSION['member_name'] && $_SESSION['member_pass'] && check_login($_SESSION['member_name'], $_SESSION['member_pass'])) {
        return 1;
    }
    return 5;
}

function simple_login($sName, $sPass) {
    simple_logout();

    $sMd5Password = MD5($sPass);

    $iCookieTime = time() + $lifetime;

    setcookie('member_name', $sName, $iCookieTime, '/');
    setcookie('member_pass', $sMd5Password, $iCookieTime, '/');
    
    $_SESSION['member_name'] = $sName;
    $_SESSION['member_pass'] = $sMd5Password;
}

function simple_logout() {
    setcookie('member_name', '', time() - $lifetime, '/');
    setcookie('member_pass', '', time() - $lifetime, '/');
    
    $_SESSION['member_name'] = '';
    $_SESSION['member_pass'] = '';
}

function check_login($sName, $sPass) {        
    $SQLCon = new SQLConnection();
    $users = $SQLCon->SQLGetUsers();

    if ($users->num_rows > 0) {
        while ($row = $users->fetch_assoc()) {
            if ($sName == $row["username"] && $sPass == $row["password"] && $row["role"] == 0) {
                $SQLCon->SQLUpdateUserIp($row["id"], get_client_ip());
                return true;
            }
        }
    }

    $SQLCon->SQLClose();

    return false;
}

function is_logged_in() {
    return isset($_COOKIE['member_name']) || isset($_SESSION['member_name']);
}

// Function to get the client IP address
function get_client_ip() {
    if ($_SERVER['HTTP_CLIENT_IP'])
        return $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        return $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        return $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        return $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        return $_SERVER['REMOTE_ADDR'];
    else
        return 'UNKNOWN';
}

?>