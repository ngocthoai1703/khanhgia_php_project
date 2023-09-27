

<style type="text/css">

	div.chat_facebook

	{

		position:fixed;

		right:-110px;

			bottom:-300px;

		width:250px;

		z-index:777777;

	}

	div.tieude_chat

	{

		/*background: #3B5998;*/

		color: #fff;

		width: 50%;

		padding: 3px 7px;

		font-size: 15px;

		cursor:pointer;

		position: fixed;
    	bottom: 50%;
    	right: -45%;

	}

	@media screen and (max-width: 460px) {
		div.tieude_chat{
			right: -36%;
		}
	}

	@media screen and (max-width: 414px){
		div.tieude_chat{
			position: fixed;
    		bottom: 50%;
    		right: -37%;
		}
	}

	@media screen and (max-width: 800px) {

		div.chat_facebook

		{

			position:fixed;

			right:-110px;

			bottom:-300px;

			width:250px;

			z-index:777777;

		}

	}

</style>





<div class="chat_facebook"><div class="tieude_chat">
	<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADpUlEQVR4nO3ZbWgURxzH8a2lb3yCUqwvikV8ZYv0TbEU31hu5mLaiNqitQoWSl+IT9jS9oUgRpAk95+L0dDmWh8iNaD4gEprlYKKmhhroQHxnbalEfGh+JQXRknRfGWyiUn1crezt7cX4X4wEG43M/O5mZ3dnfO8csopJ7YkapiYSDFfG2q1Yb82tCrhD1v6/jbss8fsOck0r3ojKZWNjFeGVcrwmxZ6tYFAxZ4rnNUpVs4QxpUMMEMYpww12tAVuPPDF1vHhpnVjI0VoVN8pIRrEQD+V5ThakKYV3TA21t4SRu2RA3IMu0ytq1iTqXjRUeYJ5hjkU+12dWM1sLJ2BCmf6oJZ5JpxkSjgBf6l81YEXoQc9D2oWCHNnxRKoQewBhWFYSYVcdkJdwbAZBuVceUQkZjf6kRehCzOxQimWaaMjwaQZBHiTRvOkOU8F2pO6+fxWx2QizYx4tKuF1Io3MboXJjuP+t2jTMMeGm7VtgiE7xbiGIqga4cAV+/xved8B83gxbT8EHDTlGJc304BDhq7CIijS0XeRJgmA+ycAv5+Gvf2FeY57pJXwZHGJoDoNIGjh6YRCRDzN7E2w7Dd09cO0ufNwU4DoRtgaGKMOvYSB7zj2LyIZJpkGOwO17/rGubvhse8B2hKMuI9LuisicIG/OXIK1B6Dz1uBndjSW7XR7/vIcIG0uiNrD0NuLc/57CF/vcfvClHDaZWodCVrxN3v9Dg2koxOW/giHOnIjLHzDT6EWlMMukO+DVLqiBe73+B27fMufNkMv/FyYphOhb4rfBoYkDSvyVfjpNrjbDV33/U7ZZffpc4bDtLSHQ2i/LAsMSRjeylXZwox/wdpVas7m3A0/jbH3iwIQ6BRvBIbYFxltuJKtItvxHa2w+IfgjQ9gzv4Js+rDI5ThH881dnsmW2XZplBQTNhnLz0AEdY7QyrqmaQMPQVNg2jLg8RGXnOG9I2K0DgCAIR6hB8aVcsr2nCj1AgtXK+q4+XQkP5RmeO0pxs9olcZ5haEyHfhxzSlarzI4i/HzSVA7IhkT2toqqsZpYSfY4Q0Ob3WukQbTAyAB0pYXhRAjJB2uw1VVEQxIcpwXgkLI78ewkKU8NABcMO+f6s078UGyAfp25EUMvampVO8njR8qFKs0YYGLezUwq6+H4iEdVpYVFHPVK+U0dkhHXYfzHueoodAlOGOFlYXbYksOsR/ZGiprGGC97xGC0sSKd4pdT/KKacczzmPAUPlEfFZ+kwaAAAAAElFTkSuQmCC">
</div>



    <div class="fb-page" data-href="<?=$company['fanpage']?>" data-tabs="messages" data-height="300px" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?=$company['fanpage']?>" class="fb-xfbml-parse-ignore"><a href="<?=$company['fanpage']?>"><?=$company['fanpage']?></a></blockquote></div>

    

</div>



<script type="text/javascript">

	$(document).ready(function(e) {

        $('.tieude_chat').click(function(){

			if($('.chat_facebook').css('right')=='0px')

			{

				$('.chat_facebook').animate({bottom:-300},500).animate({right:-110},300);

			}

			else

			{

				$('.chat_facebook').animate({right:0},300).animate({bottom:0},500);

			}

			$.ajax({

				url:'ajax/tao_session.php',

				success:function(kq){

					console.log(kq);

				}

			});

		});

    });

</script>



