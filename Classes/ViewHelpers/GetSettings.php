<?php
namespace CodingMs\ThemeBootstrap4\ViewHelpers;

/**
 *
 * @author Thomas Deuling <typo3@coding.ms>
 * @package ThemeBootstrap4
 * @subpackage ViewHelpers
 */
class GetSettings extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    /**
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     * @inject
     */
    protected $objectManager;

    /**
     * Get sub pages uids from given page uid
     *
     * @return array
     */
    public function render()
    {
        $flatSetup = $this->getFrontendController()->tmpl->flatSetup;

        $pageTS = $this->getFrontendController()->getPagesTSconfig();
        
        $rootline = $this->getFrontendController()->tmpl->generateConfig();
        $setup = $this->getFrontendController()->tmpl->setup;
        
        $temp = array($flatSetup, $pageTS, $setup);
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($temp);
        
        
        return $flatSetup;
    }

    /**
     * @return \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController
     */
    public function getFrontendController()
    {
        return $GLOBALS['TSFE'];
    }
}
