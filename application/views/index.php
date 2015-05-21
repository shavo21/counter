<section id="home">
	<div class="slider-wrapper">
	    <img src="" alt="slider image" class="slider-img slider-img-current">
	    <img src="" alt="slider image" class="slider-img slider-img-offline">
	    <div class="slider-text">
	    	<div class="txt1"></div>
	    	<div class="txt2"></div>
	    	<div class="txt3"></div>
	    </div>
	    <div class="pagination-div"></div>
	</div>
	<div class="canvas">
	    <canvas id="canvas" height="400" width="400"></canvas>
	    <input type="number" name="" id="number" value="40" readonly>
    </div>
    <script>
        var canvas=document.getElementById("canvas"),
            context=canvas.getContext("2d");
            context.lineWidth=25;
    	    context.strokeStyle="#e1B64a";
    	    context.translate(125,290);
        	context.rotate(-Math.PI/2);
        function circle(x){
        	context.clearRect(0, 0, canvas.width, canvas.height);
        	context.beginPath();
        	context.arc(100,75,150,0,x);
        	context.stroke();
        	context.closePath();
        }
        circle(2*Math.PI*40/50);</script>
</section>
