// 【メニュー】
(function($) {
    $(function() {
        var $header = $('#top-head');
        // Nav Fixed
        $(window).scroll(function() {
            if ($(window).scrollTop() > 350) {
                $header.addClass('fixed');
            } else {
                $header.removeClass('fixed');
            }
        });
        // Nav Toggle Button
        $('#nav-toggle').click(function(){
            $header.toggleClass('open');
        });
    });
})(jQuery);


// ブルブル
$(window).on('load',function(){
  $('#message').jrumble({
    x: 2,
    y: 2,
    rotation: 2,
    speed: 40
  });

  var demoStart = function(){
    $('#message').trigger('startRumble');
    setTimeout(demoStop, 300);
  };

  var demoStop = function(){
    $('#message').trigger('stopRumble');
    setTimeout(demoStart, 300);
  };

demoStart();
});



