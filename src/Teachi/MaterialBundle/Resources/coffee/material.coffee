root = exports ? this

# Sortable
$('#sortable-content').sortable
    placeholder: 'sortable-placeholder',
    update: (event, ui) ->
        $element = $(this)
        root.loader.attach $element
        $.ajax
            data: $element.sortable 'serialize'
            url: '/material/content/organize'
            success: (data) -> root.loader.detach $element

# Edit content
$('.content-block:not(.mode.edit)').live 'dblclick', (e) ->
    if $('.content-block.mode.edit').length > 0 then return

    $(this).addClass 'mode edit'

    raw = $(this).html().replace /^\s+|\s+$/g, '' # trim whitespaces
    $(this).html '<textarea>' + raw + '</textarea>'
    $('textarea', this).focus()

# Save content
$('.content-block.mode.edit').live 'blur', (e) ->
    $element = $(this)
    $element.removeClass 'mode edit'
    $element.html($('textarea', this).val())
    root.loader.attach $element
    $.ajax
        data: 'id=' + $(this).data('id') + '&content=' + $(this).html()
        url: '/material/content/update'
        success: (data) -> root.loader.detach $element

    #$('pre').addClass 'prettyprint linenums:1'