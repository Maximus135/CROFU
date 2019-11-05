'use strict';
window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        location.reload(true);
    }
}
