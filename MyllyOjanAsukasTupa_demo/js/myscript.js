/**
	file:	myscript.js
	desc:	Handles the login communication between loginform and login.php
			Displays the results from database in companies page
**/
$(document).ready(function(){
	loadInfoDefault();
	loadInfoDefault2();
	loadNewsLetterDefault();




});

//info part start
function loadInfoDefault(){
 $.getJSON( "infoDefault.php", function( data ) {
	var resultlist='';
	$.each( data, function( key, info ) {
	resultlist=resultlist+'<b>'+info.InfoTime+' '+info.infoName+'  '+info.street+' ';
	resultlist=resultlist+info.city+' '+info.postnr+' '+info.infoDesc+' '+'</b>';
	resultlist=resultlist+'<a href="'+info.Website+'" target="_new">Lisätietoa</a> ';
	resultlist=resultlist+'<br /><hr>';
	});
	$("#results2").html(resultlist);
 });
}


//info part stop

//info2 part start
function loadInfoDefault2(){
 $.getJSON( "infoDefault2.php", function( data ) {
	var resultlist='';
	$.each( data, function( key, info2 ) {
	resultlist=resultlist+'<b>'+info2.InfoTime2+' '+info2.infoName2+'  '+info2.street2+' ';
	resultlist=resultlist+info2.city2+' '+info2.postnr2+' '+info2.infoDesc2+' '+'</b>';
	resultlist=resultlist+'<a href="'+info2.Website2+'" target="_new">Lisätietoa</a> ';
	resultlist=resultlist+'<br /><hr>';
	});
	$("#results3").html(resultlist);
 });
}


//info part stop

//newsLetter part start
function loadNewsLetterDefault(){
 $.getJSON( "NewsLetterDefault.php", function( data ) {
	var resultlist='';
	$.each( data, function( key, newsLetter ) {
	resultlist=resultlist+'<b>'+newsLetter.newsName+' '+'</b>';
	resultlist=resultlist+'<a href="'+newsLetter.newsLink+'" target="_new">Avaa tiedote tästä!</a> ';
	resultlist=resultlist+'<br /><hr>';
	});
	$("#results4").html(resultlist);
 });
}

// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});
