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
 * @subpackage         	: Main SourceForge Class File
 * @source             	: /[ASCOOS\FRAMEWORK\Libraries\SourceForge_Badges]/src/sf.class.php
 * @fileNo             	: 
 * @version            	: 1.0.0
 * @created            	: 2024-03-21 20:00:00 UTC+3 
 * @updated            	: 
 * @author             	: Drogidis Christos
 * @authorSite         	: www.alexsoft.gr
 * @license 			: AGL-F
 * 
 * @since PHP 8.2.0
 */

namespace ASCOOS\FRAMEWORK\Libraries\SourceForge_Badges;

//use ASCOOS\FRAMEWORK\Core\Kernel\TObject;

/**
 * This class contains the initial implementation.
 * 
 * @property string $sf_url         It contains the main part of the url that contains our project.
 * @property array $defaults    
 * @property array $properties
 * @method void __construct()       Initializes our class
 * @method mixed getProperty()      Returns the requested property from the class's internal property array.
 * @method void setProperty()       It dynamically inserts a property into our class once the class object 
 *                                  has been created and assigned to some object variable.
 * @method array getProperties()    Returns the array of properties or null
 * 
 * @since PHP 8.2.0
 */
class TSourceForgeHandler /* extends TObject */
{

    // It contains the main part of the url that contains our project.
    public string $sf_url = 'https://sourceforge.net/projects';
    
    /**
     * AGL (ASCOOS GENERAL LICENSE)
     * 
     * - THIS TABLE SHOULD NEVER CHANGE
     */
    private array $defaults = [
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
//          2, /* [community-choice] -- The Community Choice badge is awarded to open source projects that have reached 
//                                      the milestone of 10,000 total downloads. */
//          3, /* [sf-favorite]      -- The SourceForge Favorite badge is awarded to open source projects 
//                                      that have reached the milestone of 2,000 monthly downloads for the first time. */
    //      4, /* [community-leader] -- The Community Leader badge is awarded to open source projects that have 
    //                                  reached the milestone of 50,000 total downloads. */
    //      5  /* [open-source-excellence] - The Open Source Excellence badge is awarded to open source projects 
    //                                       that have reached the milestone of 100,000 total downloads, 
    //                                       or 10,000 monthly downloads for the first time. */
        ],
        'down_codes' => ['dt','dm','dw','dd']   // Array -- Contains the download button codes
                                                //          dt=total, dm=month, dw=week, dd=day
    ];
    
    public array $properties = [];      // Dynamic configuration of property values.


    /**
     * @method void __construct() 
     * @descript    Initializes our class
     * Creates our class.
     * @param ?array $args [null]   Contains an array of class properties. 
     *                              If null, then the default property array will be used.
     * 
     * @access  public
     * @since 1.0.0
     */
    public function __construct(?array $args = null)
    { 
        if (!is_array($args) && !is_null($args)) {
            trigger_error('TSourceForgeHandler::__construct : The argument must be an array or null.', E_USER_NOTICE);
            exit;
        }

        // If it is an array and not NULL...
        if (is_array($args) && !is_null($args)) {
            // We pass to the internal properties of the user.
            foreach ($args as $key => $val) 
            {
                /** 
                 * We first check if the given properties are supported using the array of default property values, 
                 * and if so we pass the given property value to the property array.
                 */
                if (key_exists($key, $this->defaults)) $this->setProperty($key, $val);
            }
        } else { // otherwise we pass the defaults of this package.
            $this->properties = $this->defaults;
        }
    }


    /**
     * @method mixed getProperty()
     * 
     * @descript   If present, returns the requested property from the class's internal property array.
     * 
     * @param string $name  The name of the property we want returned.
     * 
     * @return mixed    Returns the property.
     * @since 1.0.0
     */
    final public function getProperty(string $name): mixed
    {
        // Returns the property from the class's internal property array.
        return $this->properties[$name];
    }


    /**
     * @method void setProperty()
     * 
     * It dynamically inserts a property into our class once the class object has been created and assigned 
     * to some object variable.
     * This method enables descendants of the class to add new attributes.
     * 
     * @param string $name  Contains the name of the input property.
     *                      If a property with that name already exists, then its value is simply replaced.
     * 
     * @param mixed $value  The value of the property.
     * 
     * @access  public
     * @since 1.0.0
     */
    final public function setProperty(string $name, mixed $value)
    {
        $this->properties[$name] = $value;
    }  
    
    
    /**
     * @method mixed getProperties()
     * 
     * Returns the array of properties or null
     */
    final public function getProperties(): ?array
    {
        return $this->properties;
    }

}
/*
####################
##  END OF CLASS  ##
####################
*/



/**
 * This class implements the buttons with the download information of the projects we have on the SourceForge website.
 * 
 * @property string $sfDownLink1;           Contains the formatted href of Link1
 * @property string $sfDownLink2            Contains the formatted href of Link2
 * @property string $sfDownImgAlt           Contains the Alt text for the image
 * @property array $down_codes              Contains the download button codes
 * @method void __construct()               Initializes the class and its object.
 * @method string|bool InfoDownloadButton() Returns the HTML code of the button with Download information
 * @method string LogoButton()              Creates a button with the SourceForge logo as a download button.
 * @method string DownloadButton()          Creates and returns a Download button
 */
class TSFButtons extends TSourceForgeHandler 
{
    private string $sfDownLink1;        // Contains the formatted href of Link1
    private string $sfDownLink2;        // Contains the formatted href of Link2
    private string $sfDownImgAlt;       // Contains the Alt text for the image
    private array $down_codes = ['dm', 'dw', 'dd', 'dt'];   // Contains the download button codes
                                                            // dt=total, dm=month, dw=week, dd=day


    /**
     * @method void __construct()
     * @descript    Initializes the class and its object.
     * @param array|null $args      Contains the array of class property values.
     * 
     * @access  public
     * @since 1.0.0
     */
    public function __construct(?array $args = null)
    {
        if (!is_array($args) && !is_null($args)) {
            trigger_error('TSFButtons::__construct : The argument must be an array or null.', E_USER_NOTICE);
            exit;
        }

        // We call the parent's create method of the class.
        parent::__construct($args);

        $this->sfDownLink1 = sprintf('https://sourceforge.net/projects/%s/files/latest/download', $this->properties['project']);
        $this->sfDownLink2 = sprintf('https://sourceforge.net/p/%s/', $this->properties['project']);
        $this->sfDownImgAlt = sprintf('Download %s', $this->properties['title']); 
    }


    /**
     * @method string|bool InfoDownloadButton()
     * 
     * @descript    Returns the HTML code of the download button containing as title the number of downloads 
     *              of our project. It can be: Total, Month, Week or Day.
     * 
     * @param string|array|null $down_code  Contains the code['dm', 'dw', 'dd', 'dt']
     * 
     * @return string|bool  Returns the HTML code or else an error message
     * 
     * @access  public
     * @since 1.0.0
     */
    final public function InfoDownloadButton(string|array|null $down_code=null): string|bool
    {
        $txt = '';
        if (is_null($down_code)) $down_code = $this->properties['down_codes'];

        // If it is String then we create the one button
        if (is_string($down_code)) {
            $img = sprintf('https://img.shields.io/sourceforge/%s/%s.svg', $down_code, $this->properties['project']);
            $txt .= '<a href="'.$this->sfDownLink1.'"><img alt="'.$this->sfDownImgAlt.'" src="'.$img.'" ></a>';

        }

        // If it is an array, then we create the buttons of the array's codes
        if (is_array($down_code)) {
            foreach ($down_code as $code) {
                if (in_array($code, $this->down_codes)) {
                    $img = sprintf('https://img.shields.io/sourceforge/%s/%s.svg', $code, $this->properties['project']);
                    $txt .= '<a href="'.$this->sfDownLink1.'"><img alt="'.$this->sfDownImgAlt.'" src="'.$img.'"></a>'."&nbsp;&nbsp;";
                } else {
                    return trigger_error('TSFButtons::makeInfoDLButton : The imported code '.$code.' does not exist in the table.', E_USER_NOTICE);
                }
            }
        }
        return $txt;
    }


    /**
     * @method string LogoButton()
     * @descript The method creates a button with the SourceForge logo as the download button.
     * @param int $type    Contains the type of logo. [17 ή 18] 
     * @return string   Returns the HTML code of the button
     * 
     * @access  public
     * @since 1.0.0
     */
    final public function LogoButton(int $type): string
    {
        return '<a href="'.$this->sfDownLink2.'"><img alt="'.$this->sfDownImgAlt.'" src="https://sourceforge.net/sflogo.php?type='.$type.'&amp;group_id='.$this->properties['id'].'" width=200></a>';      
    }



    /**
     * @method string DownloadButton() 
     * @descript Creates and returns a Download button
     * @return string   Returns the HTML code of the button
     * 
     * @access  public
     * @since 1.0.0
     */
    final public function DownloadButton(): string
    {
        return '<a href="'.$this->sfDownLink1.'"><img alt="'.$this->sfDownImgAlt.'" src="https://a.fsdn.com/con/app/sf-download-button" width=276 height=48 srcset="https://a.fsdn.com/con/app/sf-download-button?button_size=2x 2x"></a>';      
    }
}







/**
 * @descript    This class implements the display of the SourceForge badges.
 * 
 * @property array $badges          We add one or more badges for display.
 * @property array $badgeIcons      Contains the intermediate generated HTML code of the badges.
 * @method void __construct()       Creates the object of the class.
 * @method bool addBadge()          Add a badge for display. If it's an array of codes, then we add each of them.
 * @method string makeHtmlBadge()   Generates and returns HTML code for the given badge.
 * @method string getJScript()      Returns the equivalent for handling javascript badges, in HTML code.
 * @method string getSFTag()        Returns the HTML tag that specifies that the code is SourceForge Badges.
 * @method void createHTMLBadges()  We create the HTML code of the badges.
 */
class TSFBudges extends TSourceForgeHandler {

    /**
     * @property array $badges
     * 
     * @access  private
     * @since 1.0.0  
     */
    private array $badges = [
        /**
         * Display this badge on your website to showcase and link users to your SourceForge project.
         */
        0 => 'users-love-us',
        
        /**
         * The Rising Star badge is awarded to open source projects that have reached 
         * the milestone of 100 monthly downloads for the first time.
         */
        1 => "rising-star",
        
        /**
         * The Community Choice badge is awarded to open source projects that have reached 
         * the milestone of 10,000 total downloads.
         */
        2 => 'community-choice',

        /**
         * The SourceForge Favorite badge is awarded to open source projects that have reached 
         * the milestone of 2,000 monthly downloads for the first time.
         */
        3 => 'sf-favorite',         
        
        /**
         * The Community Leader badge is awarded to open source projects that have reached 
         * the milestone of 50,000 total downloads.
         */
        4 => 'community-leader',
        
        /**
         * The Open Source Excellence badge is awarded to open source projects that have reached 
         * the milestone of 100,000 total downloads, or 10,000 monthly downloads for the first time.
         */
        5 => 'open-source-excellence'
    ];

    /**
     * @property array $badgeIcons
     * 
     * @descript    This table contains the intermediate generated HTML code of the badges.
     *              Used by the createHTMLBadges() method to generate the final HTML code.
     * 
     * @access  private
     * @since 1.0.0
     */
    private array $badgeIcons = [
        'syn' => [],
        'cdn' => []
    ];



    /**
     * @method void __construct()
     * @descript    Initializes the class and its object.
     * @param array|null $args      Contains the array of class property values.
     * 
     * @access  public
     * @since 1.0.0
     */
    public function __construct(?array $args = null)
    {
        if (!is_array($args) && !is_null($args)) {
            trigger_error('TSFBudges::__construct : The argument must be an array or null.', E_USER_NOTICE);
            exit;
        }

        // We call the parent's instantiation method of the present class.
        parent::__construct($args);
        // We add to the internal table, the HTML format of the Badges requested by the user.
        $this->addBadge($this->properties['badgesID']);
    }
    

    /**
     * @method bool addBadge()
     * 
     * @descript    Add a badge for display. If it's an array of codes, then we add each of them.
     * 
     * @param int|array $badge  The code of the badge we will add for display.
     *                          If it's an array of codes, then we add each of them.
     * 
     * @return bool     Returns True if the badge was created or False if not
     * 
     * @access  public
     * @since 1.0.0
     */
    final public function addBadge(int|array $badge): bool
    {
        $return = false;

        // If Integer [Badge ID]
        if (is_int($badge)) {
            if ($badge < 4) $this->badgeIcons['syn'][$badge] = $this->makeHtmlBadge($badge);
            else $this->badgeIcons['cdn'][$badge] = $this->makeHtmlBadge($badge);
            $return = true;
        }
        
        // If Array of Integers [Badge IDs]....
        if (is_array($badge)) {
            // Then for each Badge as $b
            foreach ($badge as $b) {
                /**
                 * If it is not [4] community-leader or [5] open-source-excellence 
                 * then we pass in the `syn` subarray the html code of the Badge
                 */
                if ($b < 4) $this->badgeIcons['syn'][$b] = $this->makeHtmlBadge($b);
                
                /**
                 * If it is [4] community-leader or [5] open-source-excellence 
                 * then we pass in the `cdn` subarray the html code of the Badge
                 */
                else $this->badgeIcons['cdn'][$b] = $this->makeHtmlBadge($b);
            }
            $return = true;
        }
        return $return;
    }
    
    /**
     * @method string makeHtmlBadge()
     * @descript            Generates and returns HTML code for the given badge.
     * @param int $badge    The badge code
     * @return string       Returns the HTML code for the requested badge.
     * 
     * @since 1.0.0
     */
    final public function makeHtmlBadge(int $badge): string
    {
        $dm = ($badge > 1 ) ? ' data-metadata="achievement=oss-'.$this->badges[$badge].'"' : '';
        $cdn = ($badge > 3) ? ' data-nocdn="0" data-owned="false" data-complete="true"': ' data-nocdn="0" data-owned="true"';
        $cdn2 = ($badge > 3) ? ' display: none;': '';

        $txt = '<div class="sf-root" data-id="'.$this->properties['id'].'" data-badge="oss-'.$this->badges[$badge].'-'.$this->properties['color_scheme'].'"'.$dm.$cdn.' style="width:'.$this->properties['width'].'px'.$cdn2.'">';
        $txt .= '<a href="'.$this->sf_url.'/'.$this->properties['project'].'/" target="_blank">'.$this->properties['title'].'</a>';
        $txt .= '</div>';

        return $txt;
    }


    /**
     * @method string getJScript()
     * 
     * @descript    Returns the equivalent for handling javascript badges, in HTML code.
     * 
     * @param bool $cdn     True  : Returns javascript from the SourceForge CDN. (For badgesID 4.5)
     *                      False : Returns the javascript from its normal location
     * 
     * @return string   Returns the corresponding HTML code in string
     * 
     * @access  public
     * @since 1.0.0
     */
    final public function getJScript(bool $cdn=false): string
    {
        if ($cdn === true) $src = 'https://sourceforge.net/cdn/syndication/badge_js?sf_id='.$this->properties['id'];
        else $src = 'https://b.sf-syn.com/badge_js?sf_id='.$this->properties['id'];

        $txt = '<script>(function () {var sc=document.createElement(\'script\');sc.async=true;sc.src=\''.$src.'\';var p=document.getElementsByTagName(\'script\')[0];p.parentNode.insertBefore(sc, p);})();'."\n";
        $txt .= '</script>'."\n";                        

        return $txt;
    }


    /**
     * @method string getSFTag()
     * 
     * Returns the HTML tag that specifies that the code is SourceForge Badges.
     * 
     * @param bool $begin   True : Returns the start tag of the code
     *                      False: Returns the end tag of the code.
     * 
     * @return string  Returns the HTML tag that defines the start and end of the code for displaying SourceForge Badges.
     * 
     * @access  public
     * @since 1.0.0
     */
    final public function getSFTag(bool $begin=true)
    {

        return (($begin === true) ? "<!-- Begin SF Tag -->" : "<!-- End SF Tag -->")."\n";
    }
    
    
    /**
     * @method string createHTMLBadges()
     * @descript        We create the HTML code of the badges.
     * @return string   Returns the HTML code of the badges.
     * 
     * @access  public
     * @since 1.0.0
     */
    final public function createHTMLBadges(): string
    {
        $txt = '';
        if (count($this->badgeIcons['syn']) > 0) {
            $txt .= $this->getSFTag(true);
            foreach ($this->badgeIcons['syn'] as $key => $value) $txt .= $value;
            $txt .= $this->getJScript(false);
            $txt .= $this->getSFTag(false);
        }

        if (count($this->badgeIcons['cdn']) > 0) {
            $txt .= $this->getSFTag(true);
            foreach ($this->badgeIcons['cdn'] as $key => $value) $txt .= $value;
            $txt .= $this->getJScript(true);
            $txt .= $this->getSFTag(false);
        }        

        return $txt;
    }
}

?>