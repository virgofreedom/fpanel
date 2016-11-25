$(window).load(function(){
	$('.slider-content').fractionSlider({
		'controls': 			true,
		'pager': 				true,
		'responsive': 			true,
		'dimensions': 			"2000,880",
		'timeout' : 7000,
	});
});

$(window).load(function(){
	$('.slider-content1').fractionSlider({
		'pager': 				true,
		'responsive': 			true,
		'dimensions': "1500,200",
	});

});

$(document).ready(function(){
	$(".portfolio-feild").hide();
	$(".portfolio-feild").slice(0, 4).show();
	$("#loadMore").on('click', function (e) {
			e.preventDefault();
			$(".portfolio-feild:hidden").slice(0, 2).slideDown();
			if ($(".portfolio-feild:hidden").length == 0) {
					$("#load").fadeOut('slow');
			}
			$('html,body').animate({
					scrollTop: $(this).offset().top
			}, 1500);
	});

});

$(document).ready(function(){
	$('.clickr').click(function(){
  $('#nav ul').slideToggle(500);
});
});

$(document).ready(function() {
  var hight = $(window).height();

  function parallaxStyle() {
    var up = $(this).outerHeight();
    var middle = up / 2;
    var wMiddle = hight / 2;
    var fromTop = $(this).offset().top;
    var scroll = $(window).scrollTop();
    var speed = $(this).attr('data-parallax-speed');
    var rangeA = (fromTop - hight);
    var rangeB = (fromTop + up);
    var rangeC = (fromTop - hight);
    var rangeD = (middle + fromTop) - (wMiddle + (wMiddle / 2));

    if (rangeA < 0) {
      rangeA = 0;
      rangeB = hight
    }

    var percent = (scroll - rangeA) / (rangeB - rangeA);
    percent = percent * 100;
    percent = percent * speed;
    percent = percent.toFixed(2);

    var animFromBottom = (scroll - rangeC) / (rangeD - rangeC);
    animFromBottom = animFromBottom.toFixed(2);

    if (animFromBottom >= 1) {
      animFromBottom = 1;
    }

    $(this).css('background-position', 'center ' + percent + '%');
    $(this).find('.parallax-content').css('opacity', animFromBottom);
    $(this).find('.parallax-content').css('transform', 'scale(' + animFromBottom + ')');
  }
  $('.parallax').each(parallaxStyle);
  $(window).scroll(function(e) {
    $('.parallax').each(parallaxStyle);
  });
});

var hours = new Date().getHours();
var quote;
var morning = ('Good Morning');
var afternoon = ('Good Afternoon');
var evening = ('Good Evening');

if (hours >= 0 && hours < 12) {
  quote = morning;
} else if (hours >= 12 && hours < 17) {
  quote = afternoon;

} else if (hours >= 17 && hours < 24) {
  quote = evening;
}
document.getElementById('greeting').innerHTML = quote;

	$(document).ready(function(){
		$('#submitButton').click(function(){
				var fullname = $('#fullname').val();
				var email = $('#email').val();
				var phone = $('#phone').val();
				var message = $('#message').val();
				if(fullname==''){
					$("#error_message").html("*Name Requried");
				}else if(email==''){
					$("#error_message").html("*Email Requried");
				}else if (phone=='') {
					$("#error_message").html("*Phone Requried");
				}else if (message=='') {
					$("#error_message").html("*Message Requried");
				}else {
					$("#error_message").html('');
					$.ajax({
						method: "POST",
						url:"greeting.php",
						data:{fullname:fullname,email:email,phone:phone,message:message},
						success:function(data){
							$('#form').hide();
							$('#success_message').hide().fadeIn(2000).html(data);
							$('#form').show();
							 $('#fullname').val('');
							 $('#email').val('');
							 $('#phone').val('');
							 $('#message').val('');
						}
					});
				}
		});
	});

	$(document).ready(function(){
		$('body').show();
	});
