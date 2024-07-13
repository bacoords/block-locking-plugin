# Block Locking Plugin (Experimental)

Experimental plugin to store some content locking features that I'm testing out.

This should not be used in production and **features may be changed/removed at any time**.


## Features

## "Uses Advanced Editing Lock" Block Setting

Group and cover blocks can opt into "advanced editing lock" by checking the "Uses Advanced Editing Lock" toggle in the Advanced Inspector Controls. This will allow you to lock the structure of the group/group block, but still allow you to edit the content itself.

## "Repeater" Block Setting (disabled - broken since 6.6?)

Button and List blocks can enable a "repeater" setting in the Advanced Inspector Controls. This will allow you to duplicate/remove individual buttons and list items while inside the "Basic" mode.

## "Advanced" Lock Toggle in Toolbar

An "Advanced Editing" button at the top of the block editor allows you to quickly toggle the `contentOnly` lock on and off instead of using the "lock" button. Group blocks can opt into this behavior by checking the "Uses Advanced Editing Lock" toggle in the Advanced Inspector Controls.

## Blocks / Block Variations

### "Pattern Container" Group Block Variation

Group block variation that is perfect for scaffolding patterns. It is a full-width group block with some padding applied to it, and then an inner "container" group block with an advanced "content locking" toggle that you can use to lock your pattern once it's complete.

### "View All Patterns" Custom Block (to be removed)

This plugin also comes with a custom block that can show you all (or one specific) block patterns on the frontend of your site. Useful for when you want to test how patterns will render on your site.

## Potential Ideas

- [ ] Bring in support for section styles to locked group blocks?
