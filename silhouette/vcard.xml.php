<?php
if($_REQUEST[vcard] == "gilbert") $vcard = "gilbert";
elseif($_REQUEST[vcard] == "jason") $vcard = "jason";
else exit;

header("Content-Type: application/vcard+xml");
header("Content-Disposition: inline; filename=".$vcard.".xml");

// Get a processor
$xslt = new XSLTProcessor();

// Load the XML source
$xml = new DOMDocument;
$xml->load($vcard.".rdf");

// Load Stylesheet
$xsl = new DOMDocument;
$xsl->load('rdf_vcard2xml_vcard.xsl');
$xslt->importStyleSheet($xsl);
echo $xslt->transformToXML($xml);

/*
// Set output file
$uri = 'file:///tmp/jason.vcf';
// Transform
$xslt->transformToURI($xml,$uri);
// Spit it out
readfile($uri);
*/
exit;
?>
