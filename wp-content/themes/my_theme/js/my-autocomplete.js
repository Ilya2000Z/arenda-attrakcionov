(function( $ ) {
    $(function() {
        var url = MyAutocomplete.url + "?action=my_search";
        $( "#search" ).autocomplete({
            source: url,
            delay: 500,
            minLength: 3,
            appendTo: ".search",
        })
        .autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .append( "<a href=" + item.link + ">" + item.label + "</a>" )
                .appendTo( ul );
        };
    });

})( jQuery );