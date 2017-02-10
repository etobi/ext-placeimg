<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][TYPO3\CMS\Core\Resource\ProcessedFile::class]['className'] = \Etobi\Placeimg\Resource\ProcessedFile::class;$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['placeimg']['service'] = array(
    'placeimg' => 'http://placeimg.com/%d/%d/people/%d',
    'placebacon' => 'http://placebacon.net/%d/%d?image=%d',
    'baconmockup' => 'http://baconmockup.com/%d/%d/random/?%d',
    'lorempixum' => 'http://lorempixel.com/%d/%d/people/',
    'placekitten' => 'http://placekitten.com/%d/%d/?%d',
);

