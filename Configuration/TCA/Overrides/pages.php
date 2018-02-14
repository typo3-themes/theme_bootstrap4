<?php
//
// Linkhandler Configuration
// TYPO3 8.7
if ((int)TYPO3_version>=8) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        'theme_paperclip',
        'Configuration/PageTS/Linkhandler/tx_news_news_typo3-8.typoscript',
        'Linkhandler configuration for News (TYPO3 8.7)'
    );
}
// TYPO3 7.6
elseif ((int)TYPO3_version>=7 && (int)TYPO3_version<8) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        'theme_paperclip',
        'Configuration/PageTS/Linkhandler/tx_news_news_typo3-7.typoscript',
        'Linkhandler configuration for News (TYPO3 7.6)'
    );
}
