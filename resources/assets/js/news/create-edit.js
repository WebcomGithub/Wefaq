'use strict'

document.addEventListener('turbo:load', loadNewsCreateEdit)

let newsDetailsQuill
let newsDetailsQuillAr

function loadNewsCreateEdit () {
    // لو ما فيش محرر إنجليزي ولا عربي
    if (!$('#newsEditDetails').length && !$('#newsEditDetails_ar').length) {
        newsDetailsQuill = null
        newsDetailsQuillAr = null
        return false
    }

    if ($('#newsTagId').length) {
        $('#newsTagId').select2({
            placeholder: 'Tags',
            allowClear: true,
        })
    }

    let bindings = {
        tab: {
            key: 9,
            handler: function () {
                // Handle tab
            }
        },
    }

    // محرر الوصف الإنجليزي
    if ($('#newsEditDetails').length) {
        newsDetailsQuill = new Quill('#newsEditDetails', {
            modules: {
                toolbar: true,
                keyboard: {
                    bindings: bindings
                }
            },
            placeholder: 'Type your text here...',
            theme: 'snow',
        })

        newsDetailsQuill.on('text-change', function () {
            if (newsDetailsQuill.getText().trim().length === 0) {
                newsDetailsQuill.setContents([{ insert: '' }])
            }
        })

        // وضع البيانات وقت التعديل
        if ($('#newsIsEdit').length && $('#editNewsDescriptionData').length) {
            if ($('#newsIsEdit').val()) {
                let editNewsDescriptionData = $('#editNewsDescriptionData').val();
                let element = document.createElement('textarea');
                element.innerHTML = editNewsDescriptionData;
                newsDetailsQuill.root.innerHTML = element.value;
            }
        }
    }

    // محرر الوصف بالعربي
    if ($('#newsEditDetails_ar').length) {
        newsDetailsQuillAr = new Quill('#newsEditDetails_ar', {
            modules: {
                toolbar: true,
                keyboard: {
                    bindings: bindings
                }
            },
            placeholder: 'اكتب النص هنا...',
            theme: 'snow',
        })

        newsDetailsQuillAr.on('text-change', function () {
            if (newsDetailsQuillAr.getText().trim().length === 0) {
                newsDetailsQuillAr.setContents([{ insert: '' }])
            }
        })

        // وضع البيانات وقت التعديل
        if ($('#newsIsEdit').length && $('#editNewsDescriptionDataAr').length) {
            if ($('#newsIsEdit').val()) {
                let editNewsDescriptionDataAr = $('#editNewsDescriptionDataAr').val();
                let element = document.createElement('textarea');
                element.innerHTML = editNewsDescriptionDataAr;
                newsDetailsQuillAr.root.innerHTML = element.value;
            }
        }
    }
}

// إنشاء slug من العنوان
listen('keyup', '#newsCreateTitle', function () {
    var newsCreateTitle = $('#newsCreateTitle').val()
    $('#newsCreateSlug').val(newsCreateTitle.toLowerCase().replace(/\s+/g, '-'))
    var newsCreateSlug = $('#newsCreateSlug').val()
    if (newsCreateSlug.length > 15) {
        $('#newsCreateSlug').val(newsCreateSlug.substr(0, 15))
    }
});

// إضافة خبر
listen('submit', '#addNewsForm', function (e) {
    e.preventDefault()

    // تحقق من الوصف الإنجليزي
    if (newsDetailsQuill && newsDetailsQuill.getText().trim().length === 0) {
        displayErrorMessage('The description field is required.')
        return false
    }

    // تحقق من الوصف العربي
    if (newsDetailsQuillAr && newsDetailsQuillAr.getText().trim().length === 0) {
        displayErrorMessage('حقل الوصف بالعربية مطلوب.')
        return false
    }

    processingBtn('#addNewsForm', '#btnNewsSave', 'loading')
    $('#btnNewsSave').prop('disabled', true)

    // حفظ الإنجليزي
    if (newsDetailsQuill) {
        let editor_content = newsDetailsQuill.root.innerHTML
        let input = JSON.stringify(editor_content)
        $('#description').val(input.replace(/"/g, ''))
    }

    // حفظ العربي
    if (newsDetailsQuillAr) {
        let editor_content_ar = newsDetailsQuillAr.root.innerHTML
        let input_ar = JSON.stringify(editor_content_ar)
        $('#description_ar').val(input_ar.replace(/"/g, ''))
    }

    $('#addNewsForm')[0].submit()
    return true
})

// تعديل خبر
listen('submit', '#editNewsForm', function (event) {
    event.preventDefault()

    if (newsDetailsQuill && newsDetailsQuill.getText().trim().length === 0) {
        displayErrorMessage('The description field is required.')
        return false
    }

    if (newsDetailsQuillAr && newsDetailsQuillAr.getText().trim().length === 0) {
        displayErrorMessage('حقل الوصف بالعربية مطلوب.')
        return false
    }

    processingBtn('#editNewsForm', '#btnNewsSave', 'loading')
    $('#btnNewsSave').prop('disabled', true)

    if (newsDetailsQuill) {
        let editor_content = newsDetailsQuill.root.innerHTML
        let input = JSON.stringify(editor_content)
        $('#description').val(input.replace(/"/g, ''))
    }

    if (newsDetailsQuillAr) {
        let editor_content_ar = newsDetailsQuillAr.root.innerHTML
        let input_ar = JSON.stringify(editor_content_ar)
        $('#description_ar').val(input_ar.replace(/"/g, ''))
    }

    $('#editNewsForm')[0].submit()
    return true
})
