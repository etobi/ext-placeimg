<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][TYPO3\CMS\Core\Resource\ProcessedFile::class]['className'] = \Etobi\Placeimg\Resource\ProcessedFile::class;