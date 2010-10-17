<?php
/**
 * Dokuwiki project:chorus Template
 *
 * @link   http://wiki.splitbrain.org/wiki:tpl:templates
 * @author Pieter E Sartain <pesartain@googlemail.com>
 */
 
// must be run from dw
if (!defined('DOKU_INC')) die();

// multitemplate capable
if (isset($DOKU_TPL)==FALSE) $DOKU_TPL = DOKU_TPL; 
if (isset($DOKU_TPLINC)==FALSE) $DOKU_TPLINC = DOKU_TPLINC;
if (isset($CONF_TPL)==FALSE) $CONF_TPL = 'projectchorus'; 

// Handy function
function getRootNS($id){
	$pos = strpos((string)$id,':');
	if($pos!==false){
		return substr((string)$id,0,$pos);
	}
	return false;
}

function checkNS($ns) {
	// This tests for root NS or pagename
	//if ( (getRootNS(getID()) == $ns) || (noNSorNS(getID()) == $ns ) ) {
	
	// This version just tests the namespace, not a pagename.
	if (getRootNS(getID()) == $ns) {
		return true;
	}
	return false;
}

function getTitle() {
	global $ID;
	return p_get_first_heading($ID);
}

function getSongID() {
	global $ID;
	$arr = explode(':',$ID);
	return $arr[1];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
 lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>project:chorus ~ <?php tpl_pagetitle()?></title>

	<?php tpl_metaheaders(false,$CONF_TPL)?>

	<link rel="shortcut icon" href="<?php echo $DOKU_TPL?>images/favicon.ico" />
	<!--
	<link rel="alternate" type="application/rss+xml" title="pesartain.com/blog ~ The Last Word" href="/feed.php?ns=blog&amp;num=10&amp;linkto=current&amp;content=html" />
	-->

	<?php /*old includehook*/ @include(dirname(__FILE__).'/meta.html')?>
</head>

<body>
<?php /*old includehook*/ @include(dirname(__FILE__).'/topheader.html')?>

<div class="dokuwiki">
	<?php html_msgarea()?>
	<div class="backdrop"><img src="<?php echo $DOKU_TPL?>images/gradient1024.jpg" id="background" /></div>
	<div class="backdrop grunge">&nbsp;</div>

	<img src="<?php echo $DOKU_TPL?>images/cornerblack.png" alt="" id="cornerblack" />
	<img src="<?php echo $DOKU_TPL?>images/cornerwhite.png" alt="" id="cornerwhite" />

	<div id="content">
		<div class="scrollarea">

			<?php if (checkNS('songs')) { 
			
			$songid = getSongID();
			
			echo '<ul id="nav"><li>';
				tpl_pagelink(':songs:'.$songid,getTitle());
			echo '</li><li>';
				tpl_pagelink(':songs:'.$songid.':lyrics','Lyrics');
			echo '</li><li>';
				tpl_pagelink(':songs:'.$songid.':tab','Tab');
			echo '</li><li>';
				tpl_pagelink(':songs:'.$songid.':archive','Archive');
			echo '</li></ul>';
			
			} ?>

			<div class="xt">&nbsp;</div>
			<div class="content">
			
			<!-- wikipage start -->
			<?php tpl_content()?>
			<!-- wikipage stop -->
			
			</div>
			<div class="xb">&nbsp;</div>
			<div class="space">&nbsp</div>
		</div>
	</div>

	<div id="pageicons" class="footerinc">
		<?php
			tpl_actionlink('edit','','','<img src="'.$DOKU_TPL.'images/icons/icon_edit.png" title="Edit" alt="Edit" class="icon"></img>');
			tpl_actionlink('history','','','<img src="'.$DOKU_TPL.'images/icons/icon_revisions.png" title="Old revisions" alt="Old revisions" class="icon"></img>');
		?>
	</div>
		

	<div id="menu">
		<div class="menutitle">
			<div>project:chorus</div>
		</div>
		<div class="menulist">
			<ul><a href="/about"><div>about</div></a></ul>
			<ul><a href="/songs"><div>songs</div></a></ul>
			<ul><a href="/projects"><div>projects</div></a></ul>
			<ul><a href="/license"><div>license</div></a></ul>
		</div>
		<div id="menucontent" class="menucontent">&nbsp;</div>
		<div class="menuright footerinc">
			<?php
				tpl_actionlink('index','','','<img src="'.$DOKU_TPL.'images/icons/icon_index.png" title="Index" alt="Index" class="icon"></img>');
				tpl_actionlink('recent','','','<img src="'.$DOKU_TPL.'images/icons/icon_recent.png" title="Recent" alt="Recent" class="icon"></img>');
				tpl_actionlink('admin','','','<img src="'.$DOKU_TPL.'images/icons/icon_admin.png" title="Admin" alt="Admin" class="icon"></img>');
				tpl_actionlink('login','','','<img src="'.$DOKU_TPL.'images/icons/icon_login.png" title="Log In" alt="Log In" class="icon"></img>');
				tpl_actionlink('profile','','','<img src="'.$DOKU_TPL.'images/icons/icon_profile.png" title="Profile" alt="Profile" class="icon"></img>');
			?>
			
		</div>
	</div>
	
	<a href="/">
	<img src="<?php echo $DOKU_TPL?>images/projectchorus.png" alt="project:chorus" id="logo" />
	</a>
	
</div>

</body>
</html>

