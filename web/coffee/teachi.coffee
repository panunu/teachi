$('body').noisy 
    'intensity'  : 1, 
    'size'       : 100, 
    'opacity'    : 0.07, 
    'fallback'   : '', 
    'monochrome' : true

$('document').ready => 
    $('pre').addClass 'prettyprint linenums:1'
    prettyPrint()