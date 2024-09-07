# Theme Building for iCode
This is a boilerplate starter theme to be used for iCode Wordpress sites.  This is meant to help speed up development time on new design builds.  It uses Gulp.js to run multiple build tasks, including creating the `style.css` file which is required by WordPress.

## To Install Node Modules
1. Download or clone the repo
2. Unzip the files
3. Run `npm install` when in the root directory

## Sync up live reloads on file changes
*This command must be run in order to generate the required style.css file.*

Gulp is installed and set up to concatenate and minify javascript, as well as compile the Sass, concatenate and minify.  It is then set to watch changes on any JS, Sass, or PHP files.  On saving these files, BrowserSync will auto-reload the files.  Make sure you are running a local instance on your machine to connect up.

**NOTE** The `style.css` file is not created by default.  To create that file along with running other tasks, simply run the following command(s) in a terminal/shell.

1. Run `gulp` as an all-in-one command with watch mode.  This will compile all JS and SCSS files into the minified, single production files, optimize all images, and initiate watch mode.  This will continue to run until you terminate the command.
2. Run `gulp css` individually to compile the SCSS source files into a single `style.css` production file.  This is a singular command that does not continue to run after it finishes.
3. Run `gulp js` individually to compile the JS source files into a single `main.min.js` production file.  This is a singular command that does not continue to run after it finishes.
4. Run `gulp img` individually to create optimized image files from the source image files.  This is a singular command that does not continue to run after it finishes.
5. Run `gulp watch` individually to initiate watch mode on all PHP, SCSS, and JS files and open the browser to a local port.  This is a singular command that does not continue to run after it finishes.
6. Run `gulp purge` to remove any unused CSS from the style.css file. This process will look through all PHP files looking for selectors. Any selectors found in SASS files that are not found in a PHP file, will be removed. If a selector is being removed when it should not be, add that selector to the whitelist in gulpfile.json.

## Loading Files Onto The Server
When development has been complete, or ongoing after a site launch, files will need to make their way onto the hosted server.  Not all files in this theme should be loaded onto the server, however.  Only a select group are needed for the code to run in `production`.  The following folders and files are used only when in `development` and should not be loaded onto the server:

- `node_modules/`
- `package.json`
- `package-lock.json`
- `gulpfile.js`
- `README.md`