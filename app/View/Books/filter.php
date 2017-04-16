<?php
	echo $this->Html->script('jquery-1.11.3.min');
	echo $this->fetch('script');
?>

<script> 
$(document).ready(function() {

			
				
function showValues() {
		//alert("harsha");
		//$("#productContainer").css("opacity",0.5);
		//$("#loaderID").css("opacity",1);
		
		//e.css('visibility','visible');
		
		var sort = new Array();		
		$('input[name="sort"]:checked').each(function(){			
		sort.push($(this).val());		
		});		
	//	var mainarray = new Array();
		var sort1 = "&sort="+sort;
		
		var genrearray = new Array();		
		$('input[name="genrecheck"]:checked').each(function(){			
			genrearray.push($(this).val());		
			//$('.spanbrandcls').css('visibility','visible');			
			//alert($(this).attr("checkboxname"));	
	//		alert($(this).val());
		});
		//if(genrearray=='') $('.spanbrandcls').css('visibility','hidden');
		var genre_checklist = "&genrecheck="+genrearray;
				
		var authorarray = new Array();		
		$('input[name="authorcheck"]:checked').each(function(){			
			authorarray.push($(this).val());
			//alert($(this).val());			
			//$('.spansizecls').css('visibility','visible');	
		});
		//if(sizearray=='') $('.spansizecls').css('visibility','hidden');
		var author_checklist = "&authorcheck="+authorarray;
		
		
		/*var colorarray = new Array();		
		$('input[name="ccheck"]:checked').each(function(){			
			colorarray.push($(this).val());
			$('.spancolorcls').css('visibility','visible');		
		});
		if(colorarray=='') $('.spancolorcls').css('visibility','hidden');
		var color_checklist = "&ccheck="+colorarray;
		*/
		
		var pricearray = new Array();		
		$('input[name="price_range"]:checked').each(function(){			
			pricearray.push($(this).val());
			//alert($(this).val());
			//$('.spanpricecls').css('visibility','visible');		
		});
		//if(pricearray=='') $('.spanpricecls').css('visibility','hidden');
		var price_checklist = "&price_range="+pricearray;
		
		var main_string = genre_checklist+author_checklist+price_checklist+sort1;
		main_string = main_string.substring(1, main_string.length)
		//alert(main_string);
		
		$.ajax({
type: "POST",
url: "http://localhost/book-a-book/app/webroot/files/filter_products.php",
//dataType : 'json',
cache: false,
data: main_string,
success: function(html){
				//alert(html);
				$("#productContainer").html(html);
//$('#book tbody').html(makeTable(records));
},
	error: function(){
		alert("something went wrong");
	},
	complete : function(){
		//alert("complete");
	//	$('#book tbody').html(makeTable(records));
		//window.location = '';
	}

});
		/*
		$.ajax({
			type: "POST",
			url: "http://localhost/ajax_try/filter_products.php",
			data: main_string, 
			cache: false,
			success: function(html){
				//alert(html);
				alert("hjvgghvv");
				$("#productContainer").html(html);		
				$("#productContainer").css("opacity",1);
				//$("#loaderID").css("opacity",0);
				
				
				
			},
			complete:
			alert("vjv");
			});*/
		
		
	}
	
	$("input[type='checkbox'], input[type='radio']").on( "click", showValues );
    $("select").on( "change", showValues );
	
	/*
	$(".spangenrecls").click(function(){
		$('.genrecheck').removeAttr('checked');				
		showValues();
		//$('.spanbrandcls').css('visibility','hidden');
	});
	$(".spanauthorcls").click(function(){
		$('.authorcheck').removeAttr('checked'); 
		showValues();
	//	$('.spansizecls').css('visibility','hidden');
	});
	/*$(".spancolorcls").click(function(){
		$('.ccheck').removeAttr('checked'); showValues();
		$('.spancolorcls').css('visibility','hidden');
	});*/
	/*$(".spanpricecls").click(function(){
		$('.price_range').removeAttr('checked'); showValues();
		$('.spanpricecls').css('visibility','hidden');
	});
	$(".clear_filters").click(function(){
		$('#productCategoryLeftPanel').find('input[type=checkbox]:checked').removeAttr('checked');
		$('#productCategoryLeftPanel').find('input[type=radio]:checked').removeAttr('checked');
		showValues();
	});*/
});
 </script>
 
<?php
?>