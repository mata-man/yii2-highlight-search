
var highlight_sequence;

jQuery.fn.highlightSearch = function(element, scrollElement){
    $(this).on('click', function(){
        if($('#highlightsearch_criteria').val()!=''){
            $('.calendar-index').removeHighlight();
            $(element).highlight($('#highlightsearch_criteria').val());
            highlights = $(element).find('.highlight');
            if(highlights != null){
                highlight_sequence = 1;
                var el = $('.highlight:nth-child(' + (highlight_sequence) + ')');
                $(scrollElement).animate({
                    scrollTop: el.offset().top
                }, 500);
            }        
        }
    });
}

jQuery.fn.highlightClear = function(element)
{
    $(this).on('click', function(){
        $(element).removeHighlight();
    })
}

jQuery.fn.highlightSearchNext = function(scrollElement){
    $(this).on('click', function(){
        if(highlight_sequence != undefined){
            highlight_sequence++;
            var el = $('.highlight:nth-child(' + (highlight_sequence-1) + ')');
            if(el.top != undefined){
                $(scrollElement).animate({
                    scrollTop: el.offset().top
                }, 500);
            }else{
                highlight_sequence--;
                $(scrollElement).animate({
                    scrollTop: $('.highlight:nth-child(' + (highlight_sequence) + ')').offset().top
                }, 500);                
            }
        }
    });
}

jQuery.fn.highlightSearchPrev = function(scrollElement){
    $(this).on('click', function(){
        if(highlight_sequence){
            highlight_sequence--;
            var el = $('.highlight:nth-child(' + (highlight_sequence-1) + ')');
            if(el.top != undefined){
                $(scrollElement).animate({
                    scrollTop: el.offset().top
                }, 500);
            }else{
                highlight_sequence++;
                $(scrollElement).animate({
                    scrollTop: $('.highlight:nth-child(' + (highlight_sequence) + ')').offset().top
                }, 500);                
            }
        }
    });
}