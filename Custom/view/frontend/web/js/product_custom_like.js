define([
    "jquery"
], function($) {
    var baseurl =  window.location.origin;

    $.widget("mage.SwatchRenderer", {

        options: {
          baseurl : '',
           productid : '' 
        },

        _init: function() {
            var $widget = this;
            $widget._EventListener(); 
        },

        _EventListener: function() {
            var $widget = this;
            $(document).on('click','#like_dislike',function(){
                var like_dislike = $(this).attr('value');
                $.ajax({
                  url: $widget.options.baseurl + "custom/index/likedislike",
                  type: "POST",
                  data: { 
                    produc_id: $widget.options.productid,
                    like_dislike: like_dislike,
                  },
                  showLoader: false,
                  cache: false,
                  success: function(response) {
                    if(response.errors)
                    {

                        var url = $widget.options.baseurl + "customer/account/create/";
                        window.location.href = url;
                    }
                  }
                });
            })
        },

   
        
    })
    return $.mage.SwatchRenderer;
});