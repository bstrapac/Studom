var oModul = angular.module('oModul',['ngRoute', 'ngCookies']);
oModul.config(function($routeProvider)
	{
		$routeProvider.when('/',
		{
			templateUrl: 'templates/login.html',
			controller: 'glavniController' 
		});
		$routeProvider.when('/pocetna',
		{
			templateUrl: 'templates/pocetna.html',
			controller: 'glavniController' 
		});
		$routeProvider.when('/studenti',
		{
			templateUrl: 'templates/studenti.html',
			controller: 'glavniController'
		});
		$routeProvider.when('/sobe',
		{
			templateUrl:'templates/sobe.html',
			controller: 'glavniController'
		});
		$routeProvider.when('/zahtjevi',
		{
			templateUrl:'templates/zahtjevi.html',
			controller: 'glavniController'
		});
		$routeProvider.otherwise(
		{
		template:'Došlo je do pogreške'
		});
	});
oModul.factory('Authentication', function( $cookies ){

	var oAutentication = {};
	oAutentication.GetLoginStatus = function()
	{
		if( $cookies.get('logged_user') )
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	oAutentication.SetLoggedUser = function( sLoggedUser)
	{
		$cookies.put('logged_user', sLoggedUser)
	}

	oAutentication.Logout = function()
	{
		$cookies.remove('logged_user')
	}

	return oAutentication;
});
oModul.filter('polindrom', function()
{
	return function(input)
	{
		var palin =  input.split('').reverse().join('');
		if(input == palin)
		{
			return "Palindrom je!";
		}
		else
		{
			return "Nije palindrom!";
		}
	}

});
oModul.controller("glavniController", function($scope, $http, $location, Authentication) {

	$scope.ulogiran = false;
	if( Authentication.GetLoginStatus() == false )
	{
		$location.path('/');
	}
	$http.post('login.php', {log_id: 'check_logged_in'})
	    .then
	    (
	    	function (response) 
	    	{
		    	if( response.data == 1 )
		    	{

		    		$scope.ulogiran = true;
		    	}
		    	else
		    	{
		    		$scope.ulogiran = false;
		    		$location.path('/');
		    	}
		        
		    },
		    function (e) 
		    {
		    	console.log('error');
	    		$scope.ulogiran = false;
		 	}
	);
	$scope.Prijava = function()
	{
		var oData = {
			'log_id': 'login',
			'user_name': $scope.user,
			'password': $scope.pass
		};

	    $http.post('login.php', oData)
	    .then
	    (
	    	function (response) 
	    	{
		    	if( response.data.login_status == 1 )
		    	{
		    		$scope.ulogiran = true;
		    		Authentication.SetLoggedUser($scope.user);
		    		$location.path('/pocetna');
		    	}
		    	else
		    	{
		    		$location.path('/');
		    		alert('Netočni podaci. Pokušajte ponovno');
		    	}
		        console.log(response);
		    },
		    function (e) 
		    {
		    	console.log('error');
		 	}
		);
	};

	$scope.Odjava = function()
	{
		var oData = {
			'log_id': 'logout'
		};
		$http.post('login.php', oData)
		    .then
		    (
		    	function (response) 
		    	{
		    		$scope.ulogiran = false;
		    		Authentication.Logout();
		    		alert('Uspješno ste se odjavili');
		    		$location.path('/');
			    },
			    function (e) 
			    {
			    	console.log('error');
			 	}
		);
	};
$scope.RegistracijaStudenta = function()
	{
		var oData = {
			'log_id': 'registration_student',
			'jmbag':$scope.inptJmbag,
			'first_name':$scope.inptFirstName,
			'last_name':$scope.inptLastName,
			'email':$scope.inptEmail,
			'contact_number':$scope.inptContact,
			'college':$scope.inptCollege,			
			'gender':$scope.gender
		};

	    $http.post('login.php', oData)
	    .then
	    (
	    	function (response) 
	    	{
				console.log(response);
				
			},
		    function (e) 
		    {
		    	console.log('error');
		    	alert("Došlo je do pogreške pri registraciji. Da bi ste se registrirali morate unjeti sve podatke TOČNO.");
		 	}
		);
	};
	$scope.DeleteRequest= function(jmbag)
	{
		var oData = {
			'log_id': 'delete_request',
			'jmbag': jmbag
		};

	    $http.post('login.php', oData)
	    .then
	    (
	    	function (response) 
	    	{
				console.log(response);
				
			},
		    function (e) 
		    {
		    	console.log('error');
		    	alert("Došlo je do pogreške");
		 	}
		);
	};
	 $scope.DeleteStudent = function(jmbag)
	{
		var oData = {
			'log_id': 'delete_student',
			'jmbag': jmbag
		};

	    $http.post('login.php', oData)
	    .then
	    (
	    	function (response) 
	    	{
				console.log(response);
				
			},
		    function (e) 
		    {
		    	console.log('error');
		    	alert("Došlo je do pogreške");
		 	}
		);
	};
	$scope.sobe = [];
	$scope.naziv="Pero";
	$scope.LoadPocetna = function()
	{
		$http({
			method: 'GET',
			url: 'json.php?json_id=get_all_rooms'
		}).then(function(response) {
			$scope.sobe = response.data;
		}, function(e) {
			console.log(e);
		});
	};
	$scope.studenti = [];
	$scope.LoadStudenti = function()
	{
		$http({
			method: 'GET',
			url: 'json.php?json_id=get_all_students'
		}).then(function(response) {
			$scope.studenti = response.data;
		}, function(e) {
			console.log(e);
		});
	};

	$scope.zahtjevi = [];
	$scope.LoadZahtjevi = function()
	{
		$http({
			method: 'GET',
			url: 'json.php?json_id=get_all_requests'
		}).then(function(response) {
			$scope.zahtjevi = response.data;
		}, function(e) {
			console.log(e);
		});
	};
	$scope.GetModal = function(sHref, secondary_id)
	{
		var sUrl = sHref+secondary_id;
		$('#modals').removeData('bs.modal');
		$('#modals').modal
			({
				remote:sUrl,
				show: true
			});
	}
});


