$(document).ready(function()
{
    $('.thumbnail').each(function(index, elt)
    {
        $(elt).children(".image").each(function(index, img)
        {
            if (index > 0) {
                $(img).css('display', 'none');
            }
        });
        
        $(elt).click(function(event) {
            var imgIndex = 0;
            childElements = $(elt).children(".image");
            childElements.each(function(index, img) {
                if ($(img).css('display') != 'none') {
                    imgIndex = index;
                    $(img).css('display', 'none');
                    return false;
                }
            });
            if (imgIndex+1 >= childElements.length) {
                imgIndex = -1;
            }
            $(childElements[imgIndex+1]).css('display', 'block');

        });
    });
});  