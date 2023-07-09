(function () {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        if (all) {
            select(el, all).forEach(e => e.addEventListener(type, listener))
        } else {
            select(el, all).addEventListener(type, listener)
        }
    }

    /**
     * Sidebar toggle
     */
    if (select('.toggle-sidebar-btn')) {
        on('click', '.toggle-sidebar-btn', function (e) {
            select('body').classList.toggle('toggle-sidebar')
        })
    }
})()

$(document)
    .on('click', '.delete', function (e) {
        e.preventDefault();
        let _this = $(this),
            type = $(_this).attr('data-type');

        Swal.fire({
            text: 'Are you sure you want to delete ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
        }).then(result => {
            if (result?.value) {
                _this.parent('form').submit();
            }
        })
    });

$(document)
    .on('click', '.image_delete', function (e) {
        e.preventDefault();
        let _this = $(this),
            url = $(_this).attr('data-url');

        Swal.fire({
            text: 'Are you sure you want to delete ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
        }).then(result => {
            if (result?.value) {

                $.ajax({url: url, success: function(result){
                        _this.remove()
                    }});
            }
        })
    });