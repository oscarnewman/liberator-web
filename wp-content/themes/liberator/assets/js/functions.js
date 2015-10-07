$( document ).ready(function() {

  // Get started!
  //
  $(".search-toggle").click(function() {
    $("nav").toggleClass("search-visible");
    $(".search-field-wrap input").focus();
  });

  $('article').readingTime({
    lessThanAMinuteString: '<1 min'
  });

  var link = $('.featured-article a').attr('href');
  $('header').readingTime({
        remotePath: link,
        remoteTarget: 'article',
        error: function(message) {
            console.log(message);
            $('.time').remove();
        }
    });
});
