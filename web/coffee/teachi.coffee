root = exports ? this

$('document').ready => 
    $('pre').addClass 'prettyprint linenums:1'
    prettyPrint()

$('body').noisy 
    'intensity'  : 1, 
    'size'       : 100, 
    'opacity'    : 0.07, 
    'fallback'   : '', 
    'monochrome' : true


# Make a loader
loader = 
    loader: "<img src='/img/loader.gif' id='loader' alt='Loading' />"
    attach: (elem) -> $(this.loader).insertAfter(elem)
    detach: (elem) -> $(elem).next('#loader').fadeOut -> $(this).remove


root.loader = loader