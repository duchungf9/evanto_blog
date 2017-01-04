(function () {
    'use strict';
    ////////////////////////////////////////////////////////////////////////////////
    // Get Next Element Sibling, Get Last Element Sibling

    function getnextElementSibling(element) {
        if (element.nextElementSibling) {
            return element.nextElementSibling;
        }

        var current = element.nextSibling;
        while (current && current.nodeType !== 1) {
            current = current.nextSibling;
        }
        return current;
    }

    function getpreviousElementSibling(element) {
        if (element.previousElementSibling) {
            return element.previousElementSibling;
        }

        var current = element.previousSibling;
        while (current && current.nodeType !== 1) {
            current = current.previousSibling;
        }
        return current;
    }

    ////////////////////////////////////////////////////////////////////////////////
    // Class List functions

    function addClass(element, string) {
        if (element.classList) {
            return element.classList.add(string);
        }

        var list = element.className.split(' '),
            i,
            notpresent = true;

        for (i = 0; i < list.length; i++) {
            if (list[i] === string) {
                notpresent = false;
                break;
            }
        }
        if (notpresent) {
            element.className += (element.className ? ' ' : '') + string;
        }
    }

    function removeClass(element, string) {
        if (element.classList) {
            return element.classList.remove(string);
        }

        var list = element.className.split(' '),
            i;

        element.className = '';

        for (i = 0; i < list.length; i++) {
            if (list[i] !== string) {
                element.className += (element.className ? ' ' : '') + list[i];
            }
        }
    }

    function containsClass(element, string) {
        if (element.classList) {
            return element.classList.contains(string);
        }

        var list = element.className.split(' '),
            i,
            present = false;

        for (i = 0; i < list.length; i++) {
            if (list[i] === string) {
                present = true;
                break;
            }
        }
        return present;
    }

    ////////////////////////////////////////////////////////////////////////////////
    // Image gallery

    function boximage(idboximage, classbox, classactive) {
        var list, i,
            box = document.createElement('div'),
            boxloading = 'js-boxloading';
        box.className = classbox;

        list = document.getElementById(idboximage).getElementsByTagName('a');
        i = list.length;
        while (i--) {
            list[i].onclick = function () {

                removeClass(this, classactive);

                if (containsClass(getnextElementSibling(this), classbox)) {

                    box.parentNode.removeChild(box);

                } else {

                    if ((box.parentNode !== null) && (box.parentNode.nodeName !== '#document-fragment')) {
                        removeClass(getpreviousElementSibling(box), classactive);
                    }
                    addClass(this, classactive);

                    removeClass(box, boxloading);

                    box.innerHTML = '<div>' + this.getAttribute('title') + '</div><img src="' + this.getAttribute('href') + '">';

                    setTimeout(function () {
                        addClass(box, boxloading);
                    }, 500);

                    this.parentNode.insertBefore(box, getnextElementSibling(this));

                    var this_height = this.getBoundingClientRect().height,
                        box_height = box.getBoundingClientRect().height,
                        box_bottom = box.getBoundingClientRect().bottom,
                        client_height = document.documentElement.clientHeight;

                    if ((this.getBoundingClientRect().top < 0) || ((box_bottom > client_height) && ((this_height + box_height) > client_height))) {
                        this.scrollIntoView();
                    } else if ((box_bottom > client_height) && ((this_height + box_height) < client_height)) {
                        box.scrollIntoView(false);
                    }

                }

                var e = event || window.event;
                if (e.preventDefault) {
                    e.preventDefault();
                } else {
                    return false;
                }
            };
        }
    }

    boximage('boximage', 'box', 'arrow');

}());
