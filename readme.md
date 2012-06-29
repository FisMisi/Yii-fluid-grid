##Page layout
Basic empty page must contain this layout:
```html
<!--html/body start-->
<div class="body">
    <div class="wrap"><!-- content goes here --></div>
</div>
<!--body end-->
```

###`.body`
It is whole page canvas, uses all viewport space. Can be used for page background, you can specify page part adding `.body-header`, `.body-middle`, `.body-anythingblablabla` extended classes.

> Meanwhile `.body` canvas adds left and right page paddings, for comfortable reading. Page don't have to occupy browser window without reading margins, text reading becoming easier.

Note that even nested `.body` containers will keep same side paddings, it useful for compound backgrounds.

###`.wrap`
Used as content container, centered horizontally and having content width limit. It is useful to manage page width (minimum and maximum) if it built with numerous `.wrap` blocks:

```html    
<div class="body body-top">
    <div class="wrap"><!-- Main content --></div>
</div>
<!-- Footer context -->
<div class="body body-footer">
    <div class="wrap"><!-- Footer content --></div>
</div>
...
```

Then we shall mark-up `.wrap` blocks with columns.

##Columns
Class `.c` marks node as floating column, without width specification.

Classes beginning with `.w-` is width-modifiers, sets percentage with 5% step. `.w-15` sets 15% width to  anything.

> I said **anything** - it means not only columns can be fit do grid-based design. It is very common case, when we need to specify width to non-floated div, or `.inset` (read forward), or even text input. That is big advantage of splitting _width_ and _"columnizing"_ properties.

Also we have 12-column and 16-column grids, for "large" layout needs, and for compatibility with [960.gs](//960.gs)

###Gutters
Classes `.-c, .-c-, .c-` is used inside of column or just any container to specify column gutter.

`.clear` class used to "fix" floating elements heights, it has to be placed at the end of columns set.
We can also use `.clearfix` class added to columns parent node if present.

Now we can build example layout. Both column sets will give same result:

```html
<!-- Using .clear element at the end of set -->
<div class='c w-35'>
    <div class='c-'>Left column, gutter only on right</div>
</div>
<div class='c w-45'>
    <div class='-c-'>Here we can place any content, it will be separated with gutters both on left & right sides.</div>
</div>
<div class='c w-20'>
    <div class='-c'>Right column, gutter only on left. Pretty narrow, huh :)</div>
</div>
<div class='clear'></div>

<!-- Using clearfix parent -->
<div class='clearfix'>
    <div class='c w-35'>
        <div class='c-'>Left column, gutter only on right</div>
    </div>
    <div class='c w-45'>
        <div class='-c-'>Here we can place any content, it will be separated with gutters both on left & right sides.
    </div>
    </div>
    <div class='c w-20'>
        <div class='-c'>Right column, gutter only on left. Pretty narrow, huh :)</div>
    </div>
</div>
```