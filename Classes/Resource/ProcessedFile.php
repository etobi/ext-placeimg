<?php
namespace Etobi\Placeimg\Resource;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class ProcessedFile extends \TYPO3\CMS\Core\Resource\ProcessedFile
{

     protected $placeholderUrl = 'http://placeimg.com/%d/%d/people/%d';
//     protected $placeholderUrl = 'http://placebacon.net/%d/%d?image=%d';
//     protected $placeholderUrl = 'http://baconmockup.com/%d/%d/random/?%d';
//     protected $placeholderUrl = 'http://lorempixel.com/%d/%d/people/';
//     protected $placeholderUrl = 'http://placekitten.com/%d/%d/?%d';

    public function getPublicUrl($relativeToCurrentScript = false)
    {
        $publicUrl = parent::getPublicUrl($relativeToCurrentScript);
        if (!$publicUrl || !file_exists($publicUrl)) {
            $configuration = $this->getTask()->getTargetFile()->getProcessingConfiguration();
            $width = intval($configuration['width']) ?: $this->getProperty('width') ?: 300;
            $height = intval($configuration['height']) ?: $this->getProperty('height') ?: 300;
            return sprintf($this->placeholderUrl, $width, $height, mt_rand(1, 9));
        }
        return $publicUrl;
    }
}
