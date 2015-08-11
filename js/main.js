jQuery(document).ready(function($)
{
  $("#homeHeader").stick_in_parent({
    parent: "body"
  });
  $(".header-top").stick_in_parent({
    parent : "body"
  });
  $(".scroll").click(function(event){
    event.preventDefault();
    $('html,body').animate({scrollTop:$(this.hash).offset().top-87},1200);
  });
  $( "span.menu" ).click(function()
  {
    $( ".top-menu ul" ).slideToggle( 300, function(){});
  });

  $('#contactForm').submit(function(e)
  {
    e.preventDefault();
    $('input[type="submit"]').prop('disabled', true);
    var formData = $('#contactForm').serialize();
    $("input").prop('disabled', true);
    $("textarea").prop('disabled', true);

    $.ajax({
          type: 'POST',
          url: 'script/contacto.php',
          data: formData,
          success: function(data){
           $('#contactSuccess').show();
           $('input[type="submit"]').prop('disabled', false);
           $("input").prop('disabled', false);
           $("textarea").prop('disabled', false);
       },
          error: function(error){
          console.log(error);
           $('#contactError').show();
          $('input[type="submit"]').prop('disabled', true);
          $("input").prop('disabled', false);
          $("textarea").prop('disabled', false);
          },
          timeout: 150000
           });    return false;
  });
});
