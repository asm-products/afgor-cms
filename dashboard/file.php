<?php
if(session_id() == '') {
    $lifetime=600;
    session_start();
    setcookie(session_name(), session_id(), time()+$lifetime);
}
//Write the header includes
require_once(HD_PATH);
?>

<div class="container">
    
    <?php
        //output the login part

        $system = startSys();
        if ($system == 1) { //if user success
            if (htmlspecialchars($_GET["page"]) == "settings") {
                require(ST_PATH);
            } else if (htmlspecialchars($_GET["page"]) == "users") {
                require(US_PATH);
            } else if (htmlspecialchars($_GET["page"]) == "posts") {
                require(PS_PATH);
            } else if (htmlspecialchars($_GET["page"]) == "media") {
                require(MD_PATH);
            } else if (htmlspecialchars($_GET["page"]) == "howto") {
                require(HT_PATH);
            } else {
                require(PN_PATH);
            }
        } else { //if other issues or just wants to log in
            require(LF_PATH);
        }
    ?>
    
</div>

<?php
//Write the footer includes
require_once(FT_PATH);
