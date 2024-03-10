import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

console.log("this message is from app.js in the assets file");
/*
import { Application } from 'stimulus';
import { definitionsFromContext } from 'stimulus/webpack-helpers';

// Import all controllers in the controllers directory
const context = require.context('./controllers', true, /\.js$/);
const application = Application.start();
application.load(definitionsFromContext(context));
*/