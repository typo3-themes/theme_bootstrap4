#
# Table structure for table 'pages'
#
CREATE TABLE pages (
	sitemap_xml_exclude tinyint(4) unsigned DEFAULT '0' NOT NULL,
	sitemap_xml_priority int(3) DEFAULT '5' NOT NULL,
	sitemap_xml_change_frequency varchar(255) DEFAULT 'weekly' NOT NULL
);
