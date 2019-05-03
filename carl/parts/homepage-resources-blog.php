<div class="wrap_resources">

	<div class="wrap_content">


		<h2>RESOURCES & BLOG</h2>

			<ul>
    			<li><a href="#tab1">Gallery</a></li>
    			<li><a href="#tab2">Submit</a></li>
			</ul>

			<div>
    			<div id="tab1">
        		aqui va el texto que quiero 1
    		</div>
    		<div id="tab2">
        		aqui va el texto que quiero 2
    		</div>
			</div>
			
			<script>
			$(document).ready(function() {

				//When page loads...
				$(".tab_content").hide(); //Hide all content
				$("ul.tabs li:first").addClass("active").show(); //Activate first tab
				$(".tab_content:first").show(); //Show first tab content

				//On Click Event
				$("ul.tabs li").click(function() {

				$("ul.tabs li").removeClass("active"); //Remove any "active" class
				$(this).addClass("active"); //Add "active" class to selected tab
				$(".tab_content").hide(); //Hide all tab content

				var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to
                identify the active tab + content
				$(activeTab).fadeIn(); //Fade in the active ID content
				return false;
					});
				});
			
			</script>
			
			
			

	</div>

</div>          