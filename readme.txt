=== Plugin Name ===
Contributors: mptre
Donate link: http://qvister.se/
Tags: pages, list
Requires at least: 2.0.2
Tested up to: 2.7
Stable tag: trunk

Retrieve pages, and children, in a more sophisticated way and add the correct class to the parent li-element even if you're visting a child-page.

== Description ==

Retreive pages, and children, in a more sophisticated way and add the correct class to the current parent li-element even if you're visting a child-page.

== Installation ==

1. Upload `list-pages.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?list_pages()?>` in your templates to retrieve all pages, `<?list_pages('','Home')?>` to include a link to your root-url, `<?list_pages(3)?>` to retrieve all children of the page with an id 3