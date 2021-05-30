/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

const barsCollectionHolder = document.querySelector('#foo_bars')
let indexBars =   barsCollectionHolder.querySelectorAll("fieldset").length
const addBar = () => {
    barsCollectionHolder.innerHTML += barsCollectionHolder.dataset.prototype.replace(/__name__/g, indexBars)
    indexBars++;
}
document.querySelector("#new-bar").addEventListener('click', addBar);
