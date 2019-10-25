# Locastic Wordpress theme boilerplate

## What is included

- [x] Twig components and templates
- [x] Living styleguide
- [x] JS unit testing with Jest
- [x] Grid / Layout system
- [x] Variables and breakpoints
- [x] PostCSS
- [x] Critical CSS
- [x] JS Code splitting
- [x] Asset cache busting
- [x] Helpers
- [x] Install starter plugins with composer (Contact field 7, Advanced custom fields, Timber, Super pwa)

## Getting started

Clone this repo inside of a fresh WP installation

```
|-- wp-admin
|-- wp-content
|-- wp-includes
|-- locastic-wordpress-theme-boilerplate + 
composer.json + 
composer.json.lock + 
```

You can rename the boilerplate folder and place it inside of your themes folder
Composer.json should stay at the root of your WP installation

```
|-- wp-admin
|-- wp-content
    |--themes
        |--locastic-boilerplate -> your-project-name
|-- wp-includes
composer.json
composer.json.lock
```

Install starter plugins with composer (Contact field 7, Advanced custom fields, Timber, Super pwa)

from root: 
```
composer install
```

Move inside the theme folder
```
/wp-content/themes/your-project-name
```
and build the assets
```
npm run dev <- for development
npm run build <- for production
```


### Setup your theme and plugins

You can update the theme name inside the styles.css file at the root of the theme.
Open up your admin panal and activate both your new theme and the required plugins

Your theme should be up and running!

## Development

### Twig templates

Templating is organized in 4 different types of twig templates

```
views
layouts
partials
components
```

Views represent main page templates e.g. 'single.twig' or 'page.twig'

Layouts abstract common layout patterns that can be reused in different views

Partials include global head and foot templates

Components are the basic building blocks of your website

### Styles

Styling is written with .sss and processed with postCSS

To see and modify the used postCSS plugins open up the postcss.config.json file from inside the root of the theme

Global styles are located inside the styles folder

They include the following files:
```
index.sss
vars.sss
fonts.sss
core.sss
pattern-lab.sss
```

index.sss is used to import all of the style files inside the project 

vars.sss defines the variables for the colors, typography, grid sizes and breakpoints

fonts.sss is used to load any needed web fonts for the project

core.sss contains basic global styles and utillity classes

pattern-lab.sss contains styles applied only inside the pattern-lab styleguide

Components are named using the BEM convention and saved inside the components folder alognside their corresponding .twig template file
```
.block
    &__element
    &__element--modifier
    &--modifier
```
Layout helpers are prefixed with 'l-' and saved inside the layouts folder alognside their corresponding .twig template file

### Grid system

The default grid system is defined as:

```
// - Full

$site-width: 1200px
$number-of-cols: 12

$gutter: 20px
$outer-gutter: 20px

$gutters: $number-of-cols * $gutter

$col: calc(($site-width - $gutters) / $number-of-cols)

// - Responsive

$r-col: calc((100vw - $gutters - 2 * $outer-gutter) / $number-of-cols)

// - Mobile

$m-number-of-cols: 4

$m-gutter: 20px
$m-outer-gutter: 30px

$m-gutters: $m-number-of-cols * $m-gutter

$m-col: calc((100vw - $m-gutters - 2 * $m-outer-gutter) / $m-number-of-cols)
```

Number of cols, size of the gutters, and the maximal width of the site can be changed
and the $col values will get calculated.

Here is an example of using $col and $gutter sizes to define sizes and margins of a layout template
```
  .l
        &-sidebar-main
            display: flex
            flex-wrap: wrap

        &-sidebar
            flex: 1
            max-width: calc(2 * $col + $gutter)
            @media(--responsive)
                max-width: calc(2 * $r-col + $gutter)
            @media(--mobile)
                min-width: 100%

        &-main
            flex: 1
            margin-left: calc($col + 2 * $gutter)
            @media(--responsive)
                margin-left: calc($r-col + 2 * $gutter)
            @media(--mobile)
                margin-left: 0

```

### Scripts

Separate scripts can be added as an entry inside the webpack.config.js file

```
module.exports = {
  entry: { 
    index: './scripts/index.js',
    componentScript: './components/component-name/componentScript.js',
  },
...
```

and attached to any twig template by using:
```
{{ fn("addScript", "componentScript") }}
```

If the above code is added to a component and runs multiple times on the same page, the required script will be loaded only once.

## Living styleguide

All of the themes templates are automatically synced to Pattern lab.

You can generate and serve your styleguide with the following commands from inside the pattern-lab folder

```
composer install
php core/console --generate
php core/console --watch
php core/console --server
```

## Testing

### Javascript unit testing

Save your Jest files as scriptName.test.js next to the file being tested and then run:

```
npm test
```

### Visual regression testing

Gemini visual regression testing coming soon 

## TODO:

- [ ] Helper classes for using the grid from within twig files
- [ ] Contact form 7 extensions for prebuilt real time validation and base styles
- [ ] Visual regression testing
- [ ] Demo styleguide - typohgraphy
- [ ] Styleguide - sync media queries
- [ ] Example custom post types
- [ ] Linting
- [ ] Progressive css rendering and code splitting
- [ ] Swup.js page transitions