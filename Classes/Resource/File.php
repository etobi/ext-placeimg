<?php
namespace Etobi\Placeimg\Resource;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class File extends \TYPO3\CMS\Core\Resource\File
{

    public function getForLocalProcessing($writable = true)
    {
        $filename = parent::getForLocalProcessing($writable);
        if (!$filename || !file_exists($filename)) {
            $width = $this->getProperty('width') ?: 300;
            $height = $this->getProperty('height') ?: 300;

            $url = $this->getPlaceImgUrl($width, $height);
            GeneralUtility::mkdir_deep('typo3temp/placeimg/');
            $temporaryFilename = PATH_site . 'typo3temp/placeimg/' . md5($url) . '.jpg';
            if (!file_exists($temporaryFilename)) {
                $content = GeneralUtility::getUrl($url);
                file_put_contents($temporaryFilename, $content);
            }
            return $temporaryFilename;
        }
        return $filename;
    }

    /**
     * @param int $width
     * @param int $height
     * @return string
     */
    protected function getPlaceImgUrl($width = 300, $height = 300) {
        $configuration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['placeimg']);
        $placeholderUrl = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['placeimg']['service'][$configuration['service']];
        return sprintf(
                $placeholderUrl,
                $width,
                $height,
                mt_rand(1, 9)
        );
    }

}
