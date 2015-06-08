<?php
  class DeclaresTest extends PHPUnit_Framework_TestCase
  {
    public function testIncludesSimple()
    {
        
        //Required login form html part
        define("LF_PATH", '../panel/login/home.php');

        //Required panel form html part
        define("PN_PATH", '../panel/home.php');

        //Footer part for each page
        define("FT_PATH", '../content/parts/footer.php');

        //Header part for each page
        define("HD_PATH", '../content/parts/header.php');
        
        $this->assertEquals('../panel/login/home.php', LF_PATH);
        $this->assertEquals('../panel/home.php', PN_PATH);
        $this->assertEquals('../content/parts/footer.php', FT_PATH);
        $this->assertEquals('../content/parts/header.php', HD_PATH);
    }
      
    public function testIniReading()
    {
        $ini = parse_ini_file('dashboard/config/website.ini', 1);
        
        $this->assertEquals('default', $ini['theme']['folder']);
        $this->assertEquals('index.php', $ini['theme']['file']);
    }
  }