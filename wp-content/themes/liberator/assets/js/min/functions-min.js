$(document).ready(function(){$("article").readingTime({lessThanAMinuteString:"<1 min"});var e=$(".featured-article a").attr("href");$("header").readingTime({remotePath:e,remoteTarget:"article",error:function(e){console.log(e),$(".time").remove()}})});