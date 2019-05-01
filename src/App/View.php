<?php namespace App;

class View {
    public function render($view, $values = []) {

        // if view exists, render it
        if (file_exists($view . '.phtml')) {
            // extract variables into local scope
            extract($values);

            // render header
            require('../views/inc/header.phtml');

            // render template
            require($view . '.phtml');

            // render footer
            require('../views/inc/footer.phtml');

            exit;
        }
        // else err
        else {
            trigger_error("Invalid template: " . $view . ".phtml", E_USER_ERROR);
        }
    }
}