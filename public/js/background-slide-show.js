var i=2;
$(document).ready(function(){
	recursivetimeout();
});
function recursivetimeout(){
	setTimeout(function(){
	$(".img-container").css("background-image","url('/img/"+i+".jpg')");
	i=(i%3)+1;
	recursivetimeout();
}, 3000);
}