=== BBSpoiler ===
Contributors: flector
Tags: box, collapse, expand, hidden, jquery, faq, shortcode, block text, content, content spoiler, spoiler, spoilers
Requires at least: 3.0
Tested up to: 3.9.2
Stable tag: 1.00

This plugin allows you to hide text under the tags [spoiler]your text[/spoiler].

== Description ==

You can use this plugin to hide part of the text of a post in a nicely-formatted container that will becomes unhidden when clicked on. The plugin can be useful for creating FAQ pages, hiding large pictures, and things like that.

The plugin creates its own "Spoiler" button in the visual editor, but you can also add spoilers directly using tags. For example:

`
[spoiler title='Title']Spoiler content[/spoiler]
`

Or

`
[spoiler title='Title' collapse_link="no"]Spoiler content[/spoiler]
`


== Installation ==

1. Upload `bbspoiler` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the `Plugins` menu in WordPress.
3. That's all.

You can find the "Spoiler" plugin button in the visual editor.

== Frequently Asked Questions ==

= How do I indent paragraphs in spoiler text? =

This spoiler code gives you three paragraphs of text:

`
[spoiler title='Title' collapse_link="true"]First Paragraph

Second Paragraph

Third Paragraph[/spoiler]
`

= Can I use spoilers within spoilers? =

Yes, but only up to two levels. Use the number 2 in the shortcode. The code should look like this:

`
[spoiler title='Parent']

[spoiler2 title='Child 1']text[/spoiler2]
[spoiler2 title='Child 2']text[/spoiler2]

[/spoiler]
`


== Screenshots ==

1. "Spoiler" button and plugin dialog window.
2. Sample spoiler.
3. Sample spoiler with pictures.
4. Second-level spoilers within a primary spoiler.

== Changelog ==

= 1.00 =
* first version
