--TEST--
Check xsltprocessor::registerPHPFunctions with array and a not allowed function
--SKIPIF--
<?php 
        if (!extension_loaded('xsl')) {
                die("skip\n");
        }
?>
--FILE--
<?php
include dirname(__FILE__) .'/prepare.inc';
$phpfuncxsl = new domDocument();
$phpfuncxsl->load(dirname(__FILE__)."/phpfunc.xsl");
if(!$phpfuncxsl) {
  echo "Error while parsing the xsl document\n";
  exit;
}
$proc->importStylesheet($phpfuncxsl);
var_dump($proc->registerPHPFunctions(array()));
var_dump($proc->transformToXml($dom));
--EXPECTF--
bool(true)

Warning: XSLTProcessor::transformToXml(): Not allowed to call handler 'ucwords()' in %s on line %d
NULL
--CREDITS--
Christian Weiske, cweiske@php.net
PHP Testfest Berlin 2009-05-09
