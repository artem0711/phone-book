/*
JavaScript methods for helps user manage Phones
 */
function createPhoneField()
{
	var input = document.createElement("input");
	input.type = "text";
	input.name = "addPhone";
	input.className = "form-control";
	input.placeholder = "Number phone";
	return input;
}

$(".form-control").each(function()
{
	$(this).on("keydown", function(event)
	{
		disableLetter(event);
	});	
});

$(".btn-delete").each(function()
{
	$(this).on("click", function()
	{
		return confirm("Do you wont to delete?");
	});
});

$(".btn-primary").each(function()
{
	$(this).on("click", function()
	{
		var id = $(this).attr("id");
		var phone = $("#edit-"+id).attr("value");
		$(".btn").each(function()
		{
			$(this).addClass('disabled');
		});
		$("#edit-"+id).attr("readonly", false);
		$("#span-"+id).hide();
		$("#group-"+id).append('<span class="input-group-btn" id="span-edit"><a class="btn btn-success" id="save"><span class="glyphicon glyphicon-ok"></span></a><a class="btn btn-danger" id="cancel"><span class="glyphicon glyphicon-remove"></span></a></span>');
		$("#save").addClass("disabled");
		$("#cancel").on("click", function()
		{
			$("#span-edit").remove();
			$("#span-"+id).show();
			$("#edit-"+id).attr("readonly", true);
			$("#edit-"+id).val(phone);
			$(".btn").each(function()
			{
				$(this).removeClass('disabled');
			});
		});
		$("#edit-"+id).on("keyup", function()
		{
			if ($(this).val().length >= 3)
			{
				$("#save").removeClass("disabled");
			}
			else
			{
				$("#save").addClass("disabled");
			}
		});	
		$("#save").on("click", function()
		{
			$.ajax({
				type: "POST",
				url: "/contacts/update/"+id,
				data: ({
					'phone': $("#edit-"+id).val()
				}),
				dataType: "html"
			});
			$("#span-edit").remove();
			$("#span-"+id).show();
			$("#edit-"+id).attr("readonly", true);
			$(".btn").each(function()
			{
				$(this).removeClass('disabled');
			});
		});
	});
});

$("#addPhone").click(function()
{
	var phones = $("#phones").attr("id");
	var noPhones = $("#noPhones").attr("id");
	var addPhone = $("#addPhone").attr("id");
	if (phones)
	{
		if (noPhones) noPhones.outerHTML = "";
		addPhoneClick();
	}
});

function disableLetter(event)
{
	if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 ||
		(event.keyCode == 65 && event.ctrlKey === true) ||
		(event.keyCode >= 35 && event.keyCode <= 39))
		{
			return;
		}
	else
	{
		if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 ))
		{
			event.preventDefault();
		}
	}
}

$("#newPhoneEdit").on("keyup", function()
{
	if ($(this).val().length >= 3)
	{
		$("#btnOk").removeClass("disabled");
	}
	else
	{
		$("#btnOk").addClass("disabled");
	}
});

$("#newPhoneEdit").on("keydown", function(event)
{
	disableLetter(event);
});	

function addPhoneClick()
{
	$(".btn").each(function()
	{
		var btnId = $(this).attr("id");
		if (btnId != "btnCancel")
		{
			$(this).addClass('disabled');
		}
	});
	$("#newPhone").show();
	$("#addPhone").hide();
	$("#btnOk").addClass("disabled");
	
	$("#btnOk").click(function()
	{
		$.ajax({
			type: "POST",
			url: "/contacts/addphone",
			data: ({
				'phone': $("#newPhoneEdit").val()
			}),
			dataType: "html"
		})
		.done(function(url) {
			location.href = url;
		});
	});

	$("#btnCancel").click(function()
	{
		$("#newPhone").hide();
		$("#newPhoneEdit").val("");
		$("#addPhone").show();
		$(".btn").each(function()
		{
			$(this).removeClass('disabled');
		});
	});
}