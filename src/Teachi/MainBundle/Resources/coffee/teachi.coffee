root = exports ? this

$('document').ready => 
    $('pre').addClass 'prettyprint linenums:1'
    prettyPrint()

    $('body').noisy 
        'size'       : 100, 
        'opacity'    : 0.07, 
        'fallback'   : '', 
        'monochrome' : true

# Make a loader
loader = 
    loader: "<img src='/img/loader.gif' id='loader' alt='Loading' />"
    attach: (element) -> $(this.loader).insertAfter(element)
    detach: (element) -> $(element).next('#loader').fadeOut -> $(this).remove


root.loader = loader