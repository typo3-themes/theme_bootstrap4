# Sitemap XML

This feature provides a sitemap.xml for your Theme.

## Usage

1.   Enable feature in Root-Template.
2.   Ensure you have defined your startsite in TypoScript constants (`themes.configuration.pages.startsite`).


## How included pages are selected

1.  Starting from the defined `themes.configuration.pages.startsite` page (including this page), all pages will be included which are from type *default* `1` or *shortcut* `4`*.
2.  *Hide in menu* pages will be inculded as well.
3.  Pages with setting *sitemap.xml exclude* will be not included.
4.  Pages which are contained in *container/folder* `254` will be excluded.


## Creating a .htaccess rewrite rule

```
# Sitemap.xml
RewriteRule sitemap.xml$ /index.php?type=1532793931&no_cache=1 [L,R=301]
```

## Configure multi language

Just add the languages in setup TypoScript, which should be included in sitemap.xml:

```
tt_content.sitemap_xml {
	settings {
		languages {
			en = 1
			fr = 2
		}
	}
}
```


## Links

*   https://support.google.com/webmasters/answer/189077?hl=en&visit_id=1-636684495585537777-4129556926&rd=1
