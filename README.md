# Custom ACF Blocks Plugin

This is a plugin that creates a custom ACF Blocks, registers a custom block category, and if you want, registers custom fields.

## Steps to create a custom block:

1. Create your block category in the plugin's main php file - currently set as 'My ACF Blocks'. You may also add multiple here and define which category each block goes into
2. Create a new folder in /blocks for your block
3. Add a block.json file that defines your block. This includes the title, name (slug), description, keywords (search terms), block category, and icon (dashicon or svg)
4. Add a template.php file that has your block's php template that it will use to render
5. Add a /css folder (containing styles.css) and /js folder (containing scripts.js) if you wish to add either
6. If you are making a custom block that you want to use on a bunch of sites, it may make sense to define those fields in the plugin. Add a fields.json file in your block folder if you want to define your ACF fields in the plugin. To make that file, you can export the JSON file from the Tools page of the ACF plugin. But if you are making a one-off block, having it live with the rest of the custom fields inside ACF maybe makes more sense.
7. When using this block inside of Beaver Builder, you can assign your block (module) to a group other than Standard Modules in The Content Panel by adding the following code to block.json:
```json
"beaverBuilder": {
    "group": "ACF Blocks"
}
```
