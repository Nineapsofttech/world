
var contentstatus=0;
var count =1;
var timer;
var flag = 1 ;
var mapflag=1;
var page = 1;
////////////////////////////////random img start///////////////////////////////////
setInterval(function()
{
$(".hero").fadeOut( 1500, function() {
$(".hero").attr("style",'background:url("css/img/img'+count+'.jpg")');});
$('.hero').css('display', 'block');
$('.hero').animate({ opacity: 0 }, 0);
$('.hero').animate({ opacity: 1, top: "-10px" }, 2000);
    // Animation complete.
    if(count === 4)
    {
    	count=1;
    }
  count++ ;

}, 10000);

///////////////////////////////////random img end///////////////////////////////////////

$(document).ready(function(){
//////////////////////////////Moblie controller/////////////////////////////////////////////////////////////////////////
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
//alert(navigator.userAgent);
}

$$(".content1").swipeRight(function(){expandmap();});
$$(".content1").swipeLeft(function(){minimizemap();});
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////init page//////////////////////////////////////////////////////////
$(".auto_map_info").attr("height","0px");
$(".auto_map_info iframe").attr("height","0px");
$(".auto_map_info").attr("width","66%");
$(".auto_map_info iframe").attr("width","66%");
$("#loginopen").on("click",function(){
$(".loginfrm").css("visibility","visible");
$("#username_txt").focus();
});
/////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////function zone////////////////////////////////////////
function expandmap(){$(".auto_map_info").animate({height:window.screen.height-385+"px"});$(".auto_map_info iframe").animate({height:window.screen.height-385+"px"});$(".content1").animate({width:"100%"});$("#imgleftside").hide();};
function minimizemap(){$(".content1").animate({width:"23.23176%"});$("#imgleftside").show();};
function showlogin(){$(".loginfrm").css("visibility","visible");};
function hidelogin(){$(".loginfrm").css("visibility","hidden");};
/////////////////////////////////////////////////////////////////////////////////////////

$("#password_txt").focus(showlogin);
$("#username_txt").focus(showlogin);
$("#password_txt").focusout(hidelogin);
$("#username_txt").focusout(hidelogin);
$("#search_txt").focusout(minimizemap);
$("#search_txt").on("click",expandmap);
$(".content1").on({
    'mouseover': function () {if(flag===1){timer = setTimeout(function () {contentstatus=1;expandmap();}, 1000);}},
    'mouseout' : function () {if(contentstatus===1){$(".content1").animate({width:"23.23176%"});$("#imgleftside").show();contentstatus=0;}clearTimeout(timer);}
});
$(".pin").on({'mouseover': function () {flag=0;},'mouseout' : function () {flag=1;}});

$("#map_canvas").on("click",function(){$(".auto_map_info").animate({height:"0px"});$(".auto_map_info iframe").animate({height:"0px"});});
$("#tbrshow").html("");
$.ajax({type:'GET',url:'http://180.183.141.102:3000/getdb',success:function(data) {for(var i=0;i<10;i++){
					if(i==0)
					$("#tbrshow").append("<tr style='margin-bottom:2em; border-bottom-style: solid;border-width: 1px;border-color: #79bd9a;white-space: normal;'><td ><li style='padding-bottom:0.7em;'  class='linkme' id='"+data[i]._id+"'>"+data[i].title+"</li></ld></tr>");
					else
					$("#tbrshow").append("<tr  style='margin-bottom:2em; border-bottom-style: solid;border-width: 1px;border-color: #79bd9a;white-space: normal;'><td ><li style='padding-bottom:0.7em;padding-top:0.7em;'  class='linkme' id='"+data[i]._id+"'>"+data[i].title+"</li></ld></tr>");
					}
                    $(".linkme").on({
    'mouseover': function () {$(this).addClass("hover");},
    'mouseout' : function () {$(this).removeClass("hover");}
});
                     $(".linkme").bind("tap",function(){window.open("/worldresiden/info?id="+$(this).attr('id'),"_blank");});


				},
				error:function(err) {
					//alert("Sorry, I can't get the feed");	
				}
			});

                   
});

//$(".linkme").on('tap',window.location="/worldresiden/info?id="+$$(this).id);
/////////////////////////////////////////////////for info request////////////////////////////////
var parameter = window.location.search.replace( "?", "" );
var values = parameter.split("=");
 var lat ;
                    var loong ;
 if(values[0]==="id"&&values[1]!=null)
 {
   
    $.ajax({
                type:'GET',
                url:'http://180.183.141.102:3000/info?'+values[0]+"="+values[1],
                success:function(data) {
                     lat = data.location[0];
                     loong = data.location[1];
                     console.log(data.location[1]);
                    $("#nameaprt").html(data.title);
                    $("#detailaprt").html(data.detail);
                       if(data.location!=null)
                       {
                    $("#locationaprt").html('<iframe src="/worldresiden/map.html?location='+lat+','+loong+'" width="400" height="300" frameborder="0" style="border:0"></iframe>');
                   }
                   else
                   {
                    $("#locationaprt").html(" ")
                   }
                    $("#imageaprt").html(data.image);
                },
                error:function(err) {
                    alert("Something bad happend, IN " +url );   


                }
            });
 }
if(values[0]==="page"&&values[1]!=null)
{
   $.ajax({
                type:'GET',
                url:'http://180.183.141.102:3000/page?'+values[0]+"="+values[1],
                success:function(data) {
					
            for(var i=0;i<15;i++)
				{
					var stat = 0;
				for(var j =0;j<20;j++)
					{
						if(data[i].images[j].match(/jpg/g)||data[i].images[j].match(/png/g))
						{
						$("#columns").append('<div class="pin"><img src="'+data[i].images[j]+'""><p>'+data[i].title+'</p></div>');
              						j=20;
									stat=1;
						}
					}
					if(stat===0)
					{
						$("#columns").append('<div class="pin"><p>'+data[i].title+'</p></div>');
              			
						}
					
                }
                },
                error:function(err) {
                    alert("Something bad happend, IN " +url );   


                }
            });

}
/////////////////////////////////////////check page action ////////////////////////////////////////
$(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() == $(document).height()) {
	   page++;
        $.ajax({
                type:'GET',
                url:'http://180.183.141.102:3000/page?page='+page,
                success:function(data) {
                   		
            for(var i=0;i<15;i++)
				{
					var stat = 0;
				for(var j =0;j<20;j++)
					{
						if(data[i].images[j].match(/jpg/g)||data[i].images[j].match(/png/g))
						{
						$("#columns").append('<div class="pin"><img src="'+data[i].images[j]+'""><p>'+data[i].title+'</p></div>');
              						j=20;
									stat=1;
						}
					}
					if(stat===0)
					{
						$("#columns").append('<div class="pin"><p>'+data[i].title+'</p></div>');
              			
						}
					
                }
                },
                error:function(err) {
                    alert("Something bad happend, IN " +url );   


                }
            });
   }
});