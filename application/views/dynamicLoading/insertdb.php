<html>
<head>

<!--Jquery cdn -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Global Required Scripts Start -->

	<script src="<?php echo base_url('assets/admin/assets/js/popper.min.js')?>"></script>
	<script src="<?php echo base_url('assets/admin/assets/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/admin/assets/js/perfect-scrollbar.js')?>"> </script>

<!--Bootstrap cdn-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!--Custom script for dynamic adding-->
<script type="text/javascript" >

	$(document).ready(function ()

    {
	var surl ="<?php echo site_url() ?>";
	var burl = "<?php echo base_url() ?>";
	$.ajax({
		type: 'POST',
		url: surl + 'Dynamic_loading/ajax_load',

		success: function (data)
		{
			var ndata = JSON.parse(data);

			if (ndata.return == true)
			{
				var myOptions = ndata.a;

				var mySelect = $('#mySelect');

				myOptions.forEach(function(data)
				{
					mySelect.append(  $('<option></option>').val(data.id).html(data.name) );
				});

			}
			else if (ndata.return == false)
			{
				$('.error').text(ndata.message);
			}
			else
			{
				$('.error').text('something went wrong');
			}

		},

		error: function ()
		{
			$('.error').text('not return any jason data');
		}

	});


	$("#mySelect").select2();

	$(".add_spec").click(function()
	{
		var options = $(".htmlitems:first").find("[name=tests]").clone(); //get select and clone it
		//generate html and add options inside select

		var result = '<div class="col-md-6 mb-3 htmlitems"><label>Lab Tests</label><div class="form-control "  style="width: 325px;"><select class="new_added" style="width:300px;" name="tests">' + $(options).html() + '</select><button class="remove" style="    position: absolute;\n' +
			'    margin-left: 322px;\n' +
			'    margin-top: -28px;\n' +
			'}">-</button></div>'
		$(result).insertAfter(this) //add generated htmls before `+`
		$('#result').find('select').select2();  //initialize it

		});

	//ON CLICK OF REMOVE

        $(document).on("click", ".remove", function(){

			$(this).closest(".htmlitems").remove() //get closest div remove it
		})





});

</script>


</head>
<body>
<h2> This is a page for testing  - we can dynamiccaly create selectg box with button using jquery  </h2><br>
<div id="result">
	<div class="col-md-6 mb-3 htmlitems ">
		<label>USERS</label>
		<div class="form-control " style="width: 325px;">
			<select id="mySelect" class="" style="width: 300px;" name="tests">

			</select>
		</div>
		<a id="" class="btn btn-danger add_spec" style="position: absolute;margin-left: 336px;margin-top: -41px;"> + </a>
	</div>
</div>



<p class="error"></p>



</body>

</html>
