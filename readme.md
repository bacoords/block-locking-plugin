# Block Locking Plugin (Experimental)

Experimental plugin to store some content locking features that I'm testing out.

This should not be used in production and **features may be changed/removed at any time**.


## Features

## "Advanced" Lock Toggle in Block Toolbar / Post Toolbar

An "Advanced Editing" button at the top of the block editor allows you to quickly toggle the `contentOnly` lock on and off instead of using the "lock" button. Group blocks can opt into this behavior by checking the "Uses Advanced Editing Lock" toggle in the Advanced Inspector Controls.

## Blocks / Block Variations

### "Pattern Container" Group Block Variation

Group block variation that is perfect for scaffolding patterns. It is a full-width group block with some padding applied to it, and then an inner "container" group block with an advanced "content locking" toggle that you can use to lock your pattern once it's complete.

### "View All Patterns" Custom Block

This plugin also comes with a custom block that can show you all (or one specific) block patterns on the frontend of your site. Useful for when you want to test how patterns will render on your site.

### Theme Patterns Hidden from Site Editor (DISABLED DUE TO REST API ISSUES)

Patterns in your theme are hidden from the site editor, but patterns in your database continue to show up. While this feels counterintuitive, this is to prevent you from being shown duplicate patterns with the "locked" icon that you can't edit. Once we have a way to import pattern changes back into the database, this will be revisited.
