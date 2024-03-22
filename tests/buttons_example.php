<?php 
/**
 *   __ _  ___  ___ ___   ___   ___     ____ _ __ ___   ___
 *  / _` |/  / / __/ _ \ / _ \ /  /    / __/| '_ ` _ \ /  /
 * | (_| |\  \| (_| (_) | (_) |\  \   | (__ | | | | | |\  \
 *  \__,_|/__/ \___\___/ \___/ /__/    \___\|_| |_| |_|/__/
 * 
 * 
 ************************************************************************************
 * @ASCOOS-NAME        	: ASCOOS CMS 24'                                            *
 * @ASCOOS-VERSION     	: 24.0.0                                                    *
 * @ASCOOS-CATEGORY    	: Block (Frontend and Administrator Side)                   *
 * @ASCOOS-CREATOR     	: Drogidis Christos                                         *
 * @ASCOOS-SITE        	: www.ascoos.com                                            *
 * @ASCOOS-LICENSE     	: [Commercial] http://docs.ascoos.com/lics/ascoos/AGL.html  *
 * @ASCOOS-COPYRIGHT   	: Copyright (c) 2007 - 2024, AlexSoft Software.             *
 ************************************************************************************
 *
 * @package            	: SourceForge Buttons & Badges 
 * @subpackage         	: Example Buttons File
 * @source             	: /[ASCOOS\FRAMEWORK\Libraries\SourceForge_Badges]/tests/buttons_example.php
 * @fileNo             	: 
 * @version            	: 1.0.0
 * @created            	: 2024-03-22 00:00:00 UTC+3 
 * @updated            	: 
 * @author             	: Drogidis Christos
 * @authorSite         	: www.alexsoft.gr
 * @license 			: AGL-F
 * 
 * @since PHP 8.2.0
 */

 define('ALEXSOFT_RUN_CMS', true);

 // In ASCOOS CMS, $cms_path does not need to be declared because it is a kernel variable.
 $cms_path = str_replace('/tests', '', str_replace('\\', '/', __DIR__));  
 require_once($cms_path."/src/sf.class.php"); 

 use ASCOOS\FRAMEWORK\Libraries\SourceForge_Badges\TSFButtons;
 
 

$args = [
    'id' => 600983,                             // Integer -- The project (group_id) code
    'title' => 'Ascoos Web Extended Studio',    // String  -- The title of the project
    'project' => 'awserver',                    // String  -- The name of the project
    'down_codes' => ['dt','dm','dw','dd']       // dt=total, dm=month, dw=week, dd=day
];     
        
$objSFButtons = new TSFButtons($args);      // Create SourceForge Buttons Object
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SourceForge Badges Example</title>
    <link rel="stylesheet" href="../themes/dark/theme.css">
</head>
<body>
    <article>
        <p><?php echo $objSFButtons->DownloadButton(); ?></p>
        <p><?php echo $objSFButtons->LogoButton(5); ?></p>        
        <p><?php echo $objSFButtons->LogoButton(17); // GOOD Light ?></p>
        <p><?php echo $objSFButtons->LogoButton(18); // GOOD Dark ?></p>        
        <p><?php echo $objSFButtons->InfoDownloadButton(['dt','dm','dw','dd']); ?></p>                
    </article>
</body>
</html>