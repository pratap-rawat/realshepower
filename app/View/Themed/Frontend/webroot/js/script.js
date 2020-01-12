$( document ).ready(function() {

  $('#testimonial').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    dots:true,
    responsive:{
        0:{ 
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
    });

  $('#artist').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    dots:true,
    responsive:{
        0:{ 
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
    });

  $('#entrepreneur').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    dots:true,
    responsive:{
        0:{ 
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
    });

  $(".rsp_login_tab_button span").click(function(){
    $(".rsp_login_tab_button span").removeClass("active_form");
    $(this).addClass("active_form");
    var login_active_class = $(this).attr("data-value");
    $(".rsp_form").removeClass("form_active");
    $("." + login_active_class).addClass("form_active");
  })
  
  

  $(".rsp_login_button").click(function(){
    $(".rsp_login").toggleClass("rsp_active_form");
    $("body").toggleClass("rsp_form_overlay");
  })


  $("#FrontendUsersAddFrontEndUserForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var form_action = form.attr('action');
    //debugger;
    $.ajax({
           type: "POST",
           url: base_url+ 'frontend_users/addFrontEndUser',
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
                var result = JSON.parse(data);
                if(result.status) {
                    window.location.href = "/aboutus";
                }else{
                    document.getElementById('SignupErrorMessage').innerHTML = result.message;
                }
           }
        });
    });

  $("#FrontendUsersLogin").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var form_action = form.attr('action');
    //debugger;
    $.ajax({
           type: "POST",
           url: base_url+ 'frontend_users/login',
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
                var result = JSON.parse(data);
                console.log(result.status);
                if(result.status) {
                    window.location.href = "/aboutus";
                }else{
                    console.log(result.message);
                    document.getElementById('loginerror').innerHTML = result.message;
                }
           }
        });
    });

      $("#LeaveComment").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var form_action = form.attr('action');
        //debugger;
        $.ajax({
               type: "POST",
               url: base_url+ 'blogs/leaveComment',
               data: form.serialize(), // serializes the form's elements.
               success: function(data)
               {
                    jQuery('#appendComment').append(data);
                    jQuery('.no-comment').hide();
                    document.getElementById("comment").value = '';
               }
            });
        });

});
var clickCounter = 2;
function loadMorePosts(catId) {
    var start = document.getElementById("offset").value;
    var totalPost = 0;
    $.ajax({
        type: "GET",
        url: base_url+ 'blogs/loadMorePosts/'+catId+'/'+start,
        success: function(data)
        {
            jQuery('#PostByAjax').append(data);
            document.getElementById("offset").value = parseInt(start) + 6;
            
            totalPost = jQuery('#PostByAjax .post_cat').length;
            if(totalPost < (clickCounter * 6))
            {
                jQuery('#loadMoreBtn').hide();
            }
            clickCounter++;
        }
    });
}

function addLike(loggedInUserId, postId, postUserId) { 

    $.ajax({
        type: "GET",
        url: base_url+ 'blogs/increaseLikeCount/'+loggedInUserId+'/'+postId+'/'+postUserId,
        success: function(data)
        {
            jQuery('.liked').html(data);
        }
    });
}





const blogBox = document.querySelectorAll(".blog-box");

blogBox.forEach(function(blogBox){
    var newVal = blogBox.style.height;
    console.log(newVal);
})
/*blogBox.forEach(function(input){
    input.addEventListener('mouseover', function() {
    var newVal = this.querySelector(".img-wrapper img").getAttribute("src");
    document.querySelector(".blog-section").style.backgroundImage = "url("+ newVal+ ")";
  });
    input.addEventListener('mouseleave', function(){
       document.querySelector(".blog-section").style.backgroundImage = "url('images/blog-section-img.jpg')"; 
    })
})*/

/*function changeImage(){
    var getPathClass = document.querySelector(".author-img img").getAttribute("src");
    console.log(getPathClass);

}*/