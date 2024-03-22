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
 * @subpackage         	: Example File
 * @source             	: /[ASCOOS\FRAMEWORK\Libraries\SourceForge_Badges]/tests/badges_example.php
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

 use ASCOOS\FRAMEWORK\Libraries\SourceForge_Badges\TSFBudges;
 
 
/**
 *  The properties of the badge class.
 */
$args = [
    'id' => 600983,                             // Integer -- The project (group_id) code
    'title' => 'Ascoos Web Extended Studio',    // String  -- The title of the project
    'project' => 'awserver',                    // String  -- The name of the project
    'color_scheme' => 'white',                  // String  -- Image theme [white or black]
    'width' => 125,                             // Integer -- Image length. From 80 to 200 pixels
    'badgesID' => [
        0, /* [users-love-us]    -- Display this badge on your website to showcase and link users 
                                    to your SourceForge project. */
        1, /* [rising-star]      -- The Rising Star badge is awarded to open source projects that have reached 
                                    the milestone of 100 monthly downloads for the first time. */
        2, /* [community-choice] -- The Community Choice badge is awarded to open source projects that have reached 
                                    the milestone of 10,000 total downloads. */
        3, /* [sf-favorite]      -- The SourceForge Favorite badge is awarded to open source projects 
                                    that have reached the milestone of 2,000 monthly downloads for the first time. */
//      4, /* [community-leader] -- The Community Leader badge is awarded to open source projects that have 
//                                  reached the milestone of 50,000 total downloads. */
//      5  /* [open-source-excellence] - The Open Source Excellence badge is awarded to open source projects 
//                                       that have reached the milestone of 100,000 total downloads, 
//                                       or 10,000 monthly downloads for the first time. */
    ]
];     
        
// We create the class object
$objSFBadges = new TSFBudges($args);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SourceForge Badges Example</title>
    <link rel="stylesheet" href="../themes/default/theme.css">
</head>
<body>
    <article class="container">
        <?php 
            // We create the HTML code of the badges.
            echo $objSFBadges->createHTMLBadges();
        ?>
    </article>
</body>
</html>