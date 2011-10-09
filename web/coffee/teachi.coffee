$('document').ready => 
    $('pre').addClass 'prettyprint linenums:1'
    prettyPrint()

$('body').noisy 
    'intensity'  : 1, 
    'size'       : 100, 
    'opacity'    : 0.07, 
    'fallback'   : '', 
    'monochrome' : true

# Refactor
$('#sortable-content').sortable
    placeholder: 'sortable-placeholder',
    update: (event, ui) ->
        $.ajax
            data: $(this).sortable 'serialize'
            url: '/web/material/content/re-order'
            success: (data) ->
                console.log data