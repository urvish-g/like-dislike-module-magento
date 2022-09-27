define([
    "jquery"
], function($) {
    

    $.widget("mage.Accountrendere", {

        options: {
          baseurl : '',
          customerid : '' 
        },

        _init: function() {
            var $widget = this;
            $widget._EventListener(); 
        },

        _EventListener: function() {
            var $widget = this;
            $(document).on('click','#likedislike_action',function(){
                var like_dislike = $(this).attr('value');
                var productid = $(this).attr('productid');
                var selector = $(this);
                $.ajax({
                  url: $widget.options.baseurl +"custom/index/likedislike/",
                  type: "POST",
                  data: { 
                    produc_id: productid,
                    like_dislike: like_dislike,
                  },
                  showLoader: false,
                  cache: false,
                  success: function(response) {
                    if(response.errors)
                    {

                        var url = $widget.options.baseurl+"customer/account/create/";
                        window.location.href = url;
                    }
                    else if(!response.errors) {
                     
                      if(like_dislike == "yes")
                      {
                        selector.html('Dislike');
                        selector.attr('value','no');
                        $("#likedislike_"+productid+"").html('Like');
                      }
                      else
                      {
                        selector.html('Like');
                        selector.attr('value','yes');
                        $("#likedislike_"+productid+"").html('Dislike');

                      }
                    }
                  }
                });
            })
        },

   
        
    })
    return $.mage.Accountrendere;
});