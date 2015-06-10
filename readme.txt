=== BBSpoiler ===
Contributors: Flector
Donate link: http://goo.gl/CcxWYg
Tags: box, collapse, expand, hidden, jquery, faq, shortcode, block text, content, content spoiler, spoiler, spoilers,bbpress
Requires at least: 3.5
Tested up to: 4.2.2
Stable tag: trunk

This plugin allows you to hide text under the tags [spoiler]your text[/spoiler].

== Description ==

You can use this plugin to hide part of the text of a post in a nicely-formatted container that will becomes unhidden when clicked on. The plugin can be useful for creating FAQ pages, hiding large pictures, and things like that.

The plugin creates its own "Spoiler" button in the visual editor, but you can also add spoilers directly using tags. For example:

`
[spoiler title='Title']Spoiler content[/spoiler]
`

or

`
[spoiler title='Title' collapse_link='no']Spoiler content[/spoiler]
`

If you liked my plugin, please `rate` it.
 

== Installation ==

1. Upload `bbspoiler` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the `Plugins` menu in WordPress.
3. That's all.

You can find the "Spoiler" plugin button in the visual editor.

== Frequently Asked Questions ==

= How do I indent paragraphs in spoiler text? =

This spoiler code gives you three paragraphs of text:

`
[spoiler title='Title' collapse_link='true']First Paragraph

Second Paragraph

Third Paragraph[/spoiler]
`

= Can I use spoilers within spoilers? =

Yes, but only up to two levels. Use the number 2 in the shortcode. 
The code should look like this:

`
[spoiler title='Parent']

[spoiler2 title='Child 1']text[/spoiler2]
[spoiler2 title='Child 2']text[/spoiler2]

[/spoiler]
`

= Does the plugin support localization? =

Yes, please send your localization files (.mo и .po) to rlector@gmail.com.


== Screenshots ==

1. "Spoiler" button and plugin dialog window.
2. Sample spoiler.
3. Sample spoiler with pictures.
4. Second-level spoilers within a primary spoiler.
5. Spoiler in bbPress topic.
6. All color styles.

== Changelog ==

= 2.00 =
* added 10 different color styles

= 1.01 =
* add support for bbPress

= 1.00 =
* first version
