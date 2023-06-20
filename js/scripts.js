var LatLng = {
    lat : parseFloat(options.latitude),
    lng : parseFloat(options.longitude)
};

map = new google.maps.Map(document.getElementById('map'), {
    center: LatLng,
    zoom: parseInt(options.zoom)
});
var marker = new google.maps.Marker({
    position : LatLng,
    map: map,
    title : 'La Pizzeria'
});
$ =jQuery.noConflict();

$(document).ready(function(){
    $('.mobile-menu').on('click', function() {
        $('.site-nav').toggle('slow');
    });
    var breakpoint  = 768;
    $(window).resize(function(){
        if($(document).width() >= breakpoint ) {
            $('.site-nav').show();
        } else {
            $('.site-nav').hide();
        }
    });

    //Fluidbox
    jQuery('.gallery a').each(function(){
        jQuery(this).attr({'data-fluidbox': ''})
    });
    if(jQuery('[data-fluidbox]').length > 0) {
        jQuery('[data-fluidbox]').fluidbox();
    }

    //Adapt the map toheight
    var map = $('#map');
    //if(map.length > 0 ){
        if($(document).width() >= breakpoint ) {
            displayMaps(0);
            console.log(map);
        } else
            {
                displayMaps(300);
            }
    //}
    $(window).resize(function(){
        if($(document).width() >= breakpoint ) {
            displayMaps(0);
        } else
            {
                displayMaps(300);
            }
    });
});
function displayMaps(value){
    if(value == 0){
        var locationSection = $('.location-reservation');
        var locationHeight = locationSection.height();
        $('#map').css({'height': locationHeight});
    } else {
        $('#map').css({'height': value});
    }
}