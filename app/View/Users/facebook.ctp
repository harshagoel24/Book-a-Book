<?php 

echo $this->Html->script('jquery-1.11.3.min');
echo $this->fetch('script');
	
?>
		
<div style="width:384px;margin:0 auto;">	
<div style="margin-left:120px;overflow:hidden;height:auto;">
<?php	
				echo $this->Html->image('facebook.jpeg',
					array('width'=>'40','height'=>'40'));
				
				
			?>	
<div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true"></div>
</div>
<script>

// This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '923383967696649',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use version 2.2
  });


  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  
  
  function streamPublish(name, description, hrefTitle, hrefLink, userPrompt){
                FB.ui(
                {
                    method: 'stream.publish',
                    message: '',
                    attachment: {
                        name: name,
                        caption: '',
						"media" : [
						{
							"type" : "image",
							"src" : "https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTI9dBvUtKKd9vZFBMd8FCiJX22nE76pXbUldW6qbKAKqiJMQQAGg",
							"href" : "http://www.bookabook.co.nf"
							
						}],
                        description: (description),
                        href: hrefLink
                    },
                    action_links: [
                        { text: hrefTitle, href: hrefLink }
                    ],
                    user_prompt_message: userPrompt
                },
                function(response) {
 
                });
 
            }
            function showStream(){
                FB.api('/me', function(response) {
                    //console.log(response.id);
                    streamPublish('Half Girlfriend', 'chetan bhagat book', 'More Books', 'http://www.bookabook.co.nf', "Share Your Thoughts About This Book");
                });
            }

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function fill(x)
  {
	  $('#username').val(x);
  }
  function fill1(x)
  {
	  $('#ema').val(x);
  }
   function fill2(x)
  {
	  $('#fb_books').val(x);
  }
  
  function testAPI() {
	  
    alert('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=books,name,email,books.reads', function(response) {
	var x= response["books.reads"].data[0].data.book.title;

		var bookarray=[];
		var i,n;
	  n=(response["books.reads"].data).length;
		for(i=0; i<n; i++)
		{
		bookarray.push(response["books.reads"].data[i].data.book.title);	
     
		}
		alert("dfvd");
		//
		alert(response["books.reads"].data[0].data.book.title);	
		var dataString="name="+response.name+"&email="+response.email+"&bookarr="+bookarray;
$.ajax({
	type : "POST",
	url : "http://localhost/book-a-book/app/webroot/files/database.php",
	data: dataString,
	beforeSend: function(){},
	success : function(html){
		
	alert("success"+ response.name + " " + response.email+ " " + response.books.data[0].name);
		
		//alert(response.book.reads.data[0].data.book.title);	
 alert(response["books.reads"].data[0].data.book.title);		
fill(response.email);
fill1(response.email);
fill2(bookarray);		
	},
	error: function(){
		alert("something went wrong");
	},
	complete : function(){
		//window.location = 'http://localhost/fb/fetcharray.php';
	}
	
});

    });
  }


</script>
<ul id="su">	
<?php
echo $this->Form->create('User');
		echo '<li>';
		echo $this->Form->input('password',array('class'=>'inp'));
        echo '</li>';
		echo '<li>';
		echo $this->Form->input('password_confirmation',array('type' => 'password','class'=>'inp'));
        echo '</li>';
		echo '<li>';
		echo $this->Form->input('username',array('class'=>'inp','id'=>'username','type'=>'hidden'));
		echo '</li>';
		echo '<li>';
		echo $this->Form->input('facebook_books',array('class'=>'inp','id'=>'fb_books','type'=>'hidden'));
		echo '</li>';
		echo '<li>';
		echo $this->Form->input('email_id',array('class'=>'inp','id'=>'ema','type'=>'hidden'));
		echo '</li>';
		echo '<li>';
		echo $this->Form->end('facebook',array('id'=>'subut'));
		echo '</li>';
		
		$sql="select * from users where username=''"
?>	
</ul>
</div>
