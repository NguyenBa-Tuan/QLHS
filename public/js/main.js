(function($) {
	"use strict";
	$(document).ready(function() {
        let tabContent = $('.tab .tab-ct');
        $(tabContent[0]).show();
        $('.tab-title a').click(function(e){
            e.preventDefault();
            let id = $(this).attr('href');
            tabContent.each(function(){
                $(this).hide();
            });
            $(this).parents('.tab').find(id).show();
        })
	});
})(jQuery);