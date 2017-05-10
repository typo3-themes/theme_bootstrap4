<?php

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'subheader', 'bullets', 'replace:header_link');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'altText;LLL:EXT:theme_bootstrap4/Resources/Private/Language/locallang.xlf:content.pricing_table_linktext,header_link', 'bullets', 'after:bodytext');
