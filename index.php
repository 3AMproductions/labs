<?php
require_once('config.inc');
$_META['page_title'] = 'labs';
$doc = new HTDoc($_META['lang'], $_META['charset'], $_META['org'], $_META['domain'], $_META['base_title'], $_META['author'], $_META['page_title'], $_META['description'], $_META['keywords'], $_META['category'], $_META['title_separator']);
$doc->doctype();
$doc->add_profile(array('grddl','hcard','rel-license','rel-tag','3am-xmdp'));
$doc->add_meta(array('main','dc','dmoz','geo','tgn','icbm','icra','foaf','cc','xmdp','nav','favicon','rss','atom','grddl','sitemap'));
$doc->add_style('http://3amproductions.net/styles/main.css','screen,projection');
$doc->add_style('http://3amproductions.net/styles/ie.css','screen,projection',null,null,'IE');
$doc->add_style('http://3amproductions.net/styles/print.css','print');
$doc->add_style('http://3amproductions.net/styles/handheld.css','handheld');
$doc->script->set_dir('../3amproductions.net/scripts/');
$doc->add_script('footnotelinks.js');
$doc->head();
?>
<body>
<div id="container">

<div id="header">
<h1 id="vcard-3am" class="vcard"><span class="fn org"><span id="orgname" class="organization-name">3AM Productions</span></span> ||| <span id="note" class="note">We Make Websites</span><a class="include" href="#logo"></a></h1>
<!-- <a href="#" class="link">en espa<?=$_ENT['n-tilde']?>ol</a> -->
</div><!-- header -->

<ul id="nav" title="Main Navigation">
	<li id="skipnav"><a href="#content" title="Skip Navigation">Skip to Content</a></li>
    <li><a href="http://3amproductions.net/index" title="go to our homepage" rel="self">Home</a></li>
    <li><a href="/index" class="active" title="see what we're cooking up" rel="self">Labs</a></li>
	<li><a href="http://3amproductions.net/approach" title="follow our web development procedure" rel="next" rev="home">Procedure</a></li>
	<li><a href="http://3amproductions.net/about" title="learn more about 3AM" rel="about" rev="home">About</a></li>
	<li><a href="http://3amproductions.net/portfolio" title="see some of our previous work" rev="home">Portfolio</a></li>
	<li><a href="http://3amproductions.net/contact" title="get in touch with us" rel="contact" rev="home">Contact</a></li>
</ul>
<div id="content">

<div id="leftcolumn">
<?=$_naked?>
<h2>Welcome to 3AM Labs</h2>
<h3>Projects</h3>
<ul>
    <li><a href="diagnostic-css">Diagnostic CSS</a></li>
    <li><a href="howl">Howl</a></li>
    <li><a href="jquery/appendimport">jQuery.appendImport</a></li>
    <li><a href="jquery/firebug">jQuery.Firebug</a></li>
    <li><a href="sentinel">Sentinel</a></li>
    <li><a href="silhouette">Silhouette</a></li>
    <li><a href="ulint">μLint</a></li>
</ul>
</div><!-- leftcolumn -->

<div id="rightcolumn" class="vcard">
</div><!-- rightcolumn -->

<div id="footer"><?=$_footer?></div><!-- footer -->
</div><!-- content -->
</div><!-- container -->
<?=$_analytics?>
</body>
</html>