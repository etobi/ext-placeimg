<?php
namespace Etobi\Placeimg\Resource;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class ProcessedFile extends \TYPO3\CMS\Core\Resource\ProcessedFile
{

    public function getPublicUrl($relativeToCurrentScript = false)
    {
        $publicUrl = parent::getPublicUrl($relativeToCurrentScript);
        if (!$publicUrl || !file_exists($publicUrl)) {
            $configuration = $this->getTask()->getTargetFile()->getProcessingConfiguration();
            \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($configuration);
            $width = intval($configuration['width']) ?:
                    intval($configuration['maxWidth']) ?:
                            $this->getProperty('width') ?:
                                    300;
            $height = intval($configuration['height']) ?:
                    intval($configuration['maxHeight']) ?:
                            $this->getProperty('height') ?:
                                    300;
            $url = $this->getPlaceImgUrl($width, $height);
            return $url;
        }
        return $publicUrl;
    }

    /**
     * @param int $width
     * @param int $height
     * @return string
     */
    protected function getPlaceImgUrl($width = 300, $height = 300)
    {
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
