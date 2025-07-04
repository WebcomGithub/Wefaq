'use strict'

listen('keyup', '#menuSearch', function () {
    let value = $(this).val().toLowerCase()
    $('.nav-item').filter(function () {
        $('.no-record').addClass('d-none')
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        checkEmpty()
    })
})

function checkEmpty () {
    if ($('.nav-item:visible').last().length == 0) {
        $('.no-record').removeClass('d-none')
    }
}

listen('click', '.sidebar-aside-toggle', function () {
    if ($(this).hasClass('active') === true) {
        $('.sidebar-search-box').addClass('d-none')
    } else {
        $('.sidebar-search-box').removeClass('d-none')
    }
})
