$(document).ready(function(){
	var array=["slider1.jpg","slider2.jpg","slider3.jpg"],
	    txt1=["step 1","step 2","step 3"],
	    txt2=["lorem ipsum","lorem ipsum","lorem ipsum"],
	    txt3=["Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum quaerat porro earum. Ipsa quod cumque porro delectus earum, placeat fuga saepe doloremque? Eius earum, accusantium nihil pariatur laboriosam nulla dolorum.",
	          "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur fugit illo non, debitis rem illum, vel laborum nam a repellat voluptatum eligendi est eos quisquam tempora perferendis adipisci aperiam",
	          "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque vitae, culpa assumenda necessitatibus consequatur deleniti impedit aspernatur quasi fugiat nam hic, qui molestiae deserunt, animi tempora nostrum, voluptate neque! Molestiae."
	          ];
	for(x=0;x<array.length;x++){
		$(".pagination-div").append("<span class='pagination'></span");
    }
    $(".pagination:first-child").addClass("active");
    $(".txt1").text(txt1[0]);
    $(".txt2").text(txt2[0]);
    $(".txt3").text(txt3[0]);
    $(".slider-img-current").attr("src","public/images/"+array[0]);
    $(".pagination").click(function(){
    	    if($(".slider-img-offline").is(":animated")){
    		    return false;
    	    }
    	    $(".pagination").removeClass("active")
    	    $(this).addClass("active")
			var offset=$(this).index();
			    current=$(".slider-img-current").attr("src");
			$(".slider-img-offline").attr("src",current);
			$(".slider-img-current").attr("src","public/images/"+array[offset]);
		    $(".slider-img-offline").css({"z-index":"-999"});
		    $(".slider-text").animate({"opacity":"0"},500);
		    $(".slider-img-offline").animate({"opacity":"0"},500);
		    $(".slider-text").animate({"opacity":"1"},500);
		    setTimeout(function(){
		    	$(".txt1").text(txt1[offset]);
		    	$(".txt2").text(txt2[offset]);
		    	$(".txt3").text(txt3[offset]);
		        $(".slider-img-offline").css({"z-index":"-99999","opacity":"1"});
		        $(".slider-img-offline").attr("src",current);
		    },600);
    });
    var count=0;
    $(window).keydown(function(event){
    	var current=$(".slider-img-current").attr("src");
        if(event.keyCode==37){
        	if(count==0){
        		count=array.length;
            }
        	count--;
        	$(".pagination").removeClass("active")
        	$(".pagination:eq("+count+")").addClass("active")
            $(".slider-img-offline").attr("src",current);
            $(".slider-img-current").attr("src","public/images/"+array[count]);
            $(".slider-img-offline").css({"z-index":"-999"});
            $(".slider-text").animate({"opacity":"0"},500);
            $(".slider-img-offline").animate({"opacity":"0"},500);
            $(".slider-text").animate({"opacity":"1"},500);
        	    setTimeout(function(){
        	    	$(".txt1").text(txt1[count]);
        	    	$(".txt2").text(txt2[count]);
        	    	$(".txt3").text(txt3[count]);
        	        $(".slider-img-offline").css({"z-index":"-99999","opacity":"1"});
        	        $(".slider-img-offline").attr("src",current);
        	    },600);
        }
        else if(event.keyCode==39){
            if(count==array.length-1){
            	count=-1;
            }
            count++;
            $(".pagination").removeClass("active")
            $(".pagination:eq("+count+")").addClass("active")
            $(".slider-img-offline").attr("src",current);
            $(".slider-img-current").attr("src","public/images/"+array[count]);
            $(".slider-img-offline").css({"z-index":"-999"});
            $(".slider-text").animate({"opacity":"0"},500);
            $(".slider-img-offline").animate({"opacity":"0"},500);
            $(".slider-text").animate({"opacity":"1"},500);
    	    setTimeout(function(){
    	    	$(".txt1").text(txt1[count]);
    	    	$(".txt2").text(txt2[count]);
    	    	$(".txt3").text(txt3[count]);
    	        $(".slider-img-offline").css({"z-index":"-99999","opacity":"1"});
    	        $(".slider-img-offline").attr("src",current);
    	    },600);
        }
   });
    $('#send').click(function(){
   	 $(".controls .mod_tm").each(function(){
   		 if($(this).val()==''){
   			 $(this).next().fadeIn();
   		 }else{
   			 $(this).next().fadeOut();
   		 }
   	 })
    })
    $("#button").click(function(){
    	 $(".controls .mod_tm").val("");
    })
    $("html").niceScroll();
    url();
});
function url(){
    var href=window.location.pathname,
        href=href.split("/");
    $(".ul-menu a").each(function(){
    	if($(this).text()==href[2]||(href[2]=="" && $(this).text()=="home")){
    		$(this).css("color","#e1b64a");
    	}
    });
}