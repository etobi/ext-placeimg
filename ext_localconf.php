<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

if (!empty($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['placeimg'])) {
    $configuration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['placeimg']);
    if ($configuration['serverSide']) {
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Core\Resource\File::class]['className'] = \Etobi\Placeimg\Resource\File::class;
    }
    if ($configuration['clientSide']) {
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Core\Resource\ProcessedFile::class]['className'] = \Etobi\Placeimg\Resource\ProcessedFile::class;
    }
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['placeimg']['service'] = array(
    'placeimg' => 'http://placeimg.com/%d/%d/people/%d',
    'placebacon' => 'http://placebacon.net/%d/%d?image=%d',
    'baconmockup' => 'http://baconmockup.com/%d/%d/random/?%d',
    'lorempixum' => 'http://lorempixel.com/%d/%d/people/',
    'placekitten' => 'http://placekitten.com/%d/%d/?%d',
);

