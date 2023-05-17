$(document).ready(function () {
    $('.navbar_menu_btn').on('click', function (e) {
        if ($(this).hasClass('collapsed')) {
            toggleMenu('false', true);
        } else {
            toggleMenu('true', true);
        }
    });

    $('.navbar_menu > li > a').on('click', function (e) {
        if ($('.navbar_menu_btn').hasClass('collapsed')) {
            toggleMenu('false');
        }
    });

    if (localStorage.getItem('menu_toggle') && localStorage.getItem('menu_toggle') === 'true') {
        toggleMenu('true', true);
    }

    let navbar_menu = $('.navbar_menu');

    $('.navbar_menu a').on('click', function () {
        let parent_li = $(this).parent();
        let li_active = parent_li.parent().find('li.active');

        li_active.removeClass('active');
        li_active.find('ul').removeClass('show');
        parent_li.addClass('active');
    });

    localStorage.setItem('menu', String(document.location));

    navbar_menu.find('a[href]').on('click', function () {
        localStorage.setItem('menu', $(this).attr('href'));
    });

    if (!localStorage.getItem('menu')) {
        navbar_menu.find('#menu-dashboard').addClass('active');
    } else {
        navbar_menu.find('a[href=\'' + localStorage.getItem('menu') + '\']').parent().addClass('active');
    }

    let navbar_menu_link = navbar_menu.find('a[href=\'' + localStorage.getItem('menu') + '\']');

    navbar_menu_link.parents('li').children('a').removeClass('collapsed');

    navbar_menu_link.parents('ul').addClass('show');

    navbar_menu_link.parents('li').addClass('active');

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
});

function toggleMenu($bool, $session) {
    let target = $('.app_left_container');
    let navbar_menu_btn = $('.navbar_menu_btn');
    let text_show = navbar_menu_btn.data('text');
    let icon = navbar_menu_btn.find('i');

    if ($bool === 'false') {
        navbar_menu_btn.removeClass('collapsed');
        navbar_menu_btn.find('span').show();
        icon.addClass('fa-square-caret-left');
        icon.removeClass('fa-square-caret-right');
        if ($session) {
            localStorage.setItem('menu_toggle', 'false');
        }
        target.removeClass('minimized');
    }
    if ($bool === 'true') {
        navbar_menu_btn.addClass('collapsed');
        navbar_menu_btn.find('span').hide();
        icon.removeClass('fa-square-caret-left');
        icon.addClass('fa-square-caret-right');
        navbar_menu_btn.prop('title', text_show);
        if ($session) {
            localStorage.setItem('menu_toggle', 'true');
        }
        target.addClass('minimized');
    }
}
