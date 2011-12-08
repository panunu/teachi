$('document').ready => 
    #$('pre').addClass 'prettyprint linenums:1'
    #prettyPrint()

###$('body').noisy 
    'intensity'  : 1, 
    'size'       : 100, 
    'opacity'    : 0.07, 
    'fallback'   : '', 
    'monochrome' : true###

# Refactor
$('#sortable-content').sortable
    placeholder: 'sortable-placeholder',
    update: (event, ui) ->
        $.ajax
            data: $(this).sortable 'serialize'
            url: '/web/material/content/organize'
            success: (data) -> return


$('.content-block:not(.mode.edit)').live 'dblclick', (e) ->
    if $('.content-block.mode.edit').length > 0 then return

    $(this).addClass 'mode edit'

    raw = $(this).html().replace /^\s+|\s+$/g, '' # trim whitespaces
    $(this).html '<textarea>' + raw + '</textarea>'
    $('textarea', this).focus()

$('.content-block.mode.edit').live 'blur', (e) ->
    $(this).removeClass 'mode edit'
    $(this).html($('textarea', this).val())
    #$('pre').addClass 'prettyprint linenums:1'

# Make a loader