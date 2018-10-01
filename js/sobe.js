$(document).ready(function ()
{
});
function NewSmještaj(jmbag)
{
	$.ajax({
		url:'http://localhost/Studom/action.php',
		type:'POST',
		datatype:'html',
		data:
		{
			action_id: 'new_arrangement',
			room_number: $('#select_number').val(),
			jmbag:jmbag
		},
		 success: function (oData)
	    {
			$("#modals").modal('hide');
			alert('Uspješno ste smjestili studenta u sobu.');
	    },
	    error: function (XMLHttpRequest, textStatus, exception)
		{
	        console.log("Ajax failure\n" + error);
	    },
	    async: true
	});
}
function DeleteSmjestaj(soba_broj, jmbag)
{
	$.ajax({
		url:'http://localhost/Studom/action.php',
		type:'POST',
		datatype:'html',
		data:
		{
			action_id: 'delete_arrangement',
			room_number: soba_broj,
			jmbag:jmbag
		},
		 success: function (oData)
	    {
			$("#modals").modal('hide');
			alert('Uspješno ste uklonili studenta iz sobe.');

	    },
	    error: function (XMLHttpRequest, textStatus, exception)
		{
	        console.log("Ajax failure\n" + error);
	    },
	    async: true
	});
}	
	function UpdateSmjestaj(soba_broj)
{
	$.ajax({
		url:'http://localhost/Studom/action.php',
		type:'POST',
		datatype:'html',
		data:
		{
			action_id: 'new_arrangement',
			room_number: soba_broj,
			jmbag:$('#jmbag').val()
		},
		 success: function (oData)
	    {
			$("#modals").modal('hide');
			alert('Uspješno ste smjestili studenta u sobu.');
	    },
	    error: function (XMLHttpRequest, textStatus, exception)
		{
	        console.log("Ajax failure\n" + error);
	    },
	    async: true
	});
}
	function NewZahtjev(jmbag)
{
	$.ajax({
		url:'http://localhost/Studom/action.php',
		type:'POST',
		datatype:'html',
		data:
		{
			action_id: 'new_request',
			jmbag: jmbag
		},
		 success: function (oData)
	    {
			$("#modals").modal('hide');
			alert('Uspjeh!');
	    },
	    error: function (XMLHttpRequest, textStatus, exception)
		{
	        console.log("Ajax failure\n" + error);
	    },
	    async: true
	});
}
function UpdateSmjestajNew(jmbag, soba_broj)
{
	$.ajax({
		url:'http://localhost/Studom/action.php',
		type:'POST',
		datatype:'html',
		data:
		{
			action_id: 'update_room',
			jmbag: jmbag,
			room_number: soba_broj
		},
		 success: function (oData)
	    {
			$("#modals").modal('hide');
	    },
	    error: function (XMLHttpRequest, textStatus, exception)
		{
	        console.log("Ajax failure\n" + error);
	    },
	    async: true
	});	
}
function UpdateSmjestajUp(jmbag)
{
	$.ajax({
		url:'http://localhost/Studom/action.php',
		type:'POST',
		datatype:'html',
		data:
		{
			action_id: 'update_room_up',
			jmbag: jmbag,
			room_number: $('#select_room').val()
		},
		 success: function (oData)
	    {
			$("#modals").modal('hide');
	    },
	    error: function (XMLHttpRequest, textStatus, exception)
		{
	        console.log("Ajax failure\n" + error);
	    },
	    async: true
	});
}

