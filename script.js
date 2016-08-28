	// create the module and name it scotchApp
	var scotchApp = angular.module('scotchApp', ['ngRoute']);

	// configure our routes
	scotchApp.config(function($routeProvider) {

		$routeProvider

			// route for the home page
			.when('/', {
				templateUrl : 'pages/home.html',
				controller  : 'mainController',
				title:'Siddhu Vydyabhushana\'s Creative Portfolio'
			})

			// route for the about page
			.when('/about', {
				templateUrl : 'pages/about.html',
				controller  : 'aboutController',
				title:'About Siddhu Vydyabhushana'
			})

			// route for the contact page
			.when('/contact', {
				templateUrl : 'pages/contact.html',
				controller  : 'contactController'
			})

			// route for the images page
			.when('/images', {
				templateUrl : 'pages/images.html',
				controller  : 'imagesController'
			})

			// route for the images page
			.when('/skills', {
				templateUrl : 'pages/skills.html',
				controller  : 'skillsController',
				title:'Siddhu Vydyabhushana\'s Skills'
			})


			.otherwise({
				redirectTo:'/skills'
			});
	});

	
	scotchApp.controller('imagesController', function($scope) {
		$scope.message = 'Look! I am an about page.';
		$scope.parentObj.headerSearch=true;
		console.log($scope.parentObj.headerSearch);

	});

	scotchApp.controller('skillsController', function($scope) {
		$scope.message = 'Look! I am an about page.';
		$scope.parentObj.headerSearch=true;
		$scope.parentObj.header2=true;
		$scope.parentObj.footer=false;
		console.log($scope.parentObj.headerSearch);

	});

	scotchApp.controller('aboutController',['$scope','HeaderService',function($scope,HeaderService) {
		$scope.message = 'Look! I am an about page.';
		$scope.message = 'Look! I am an about page.';
		$scope.parentObj.headerSearch=true;
		$scope.parentObj.header2=true;
		$scope.parentObj.footer=false;
		console.log($scope.parentObj.headerSearch);
		
		console.log($scope.parentObj.headerSearch+" "+$scope.parentObj.header2+"  "+$scope.parentObj.footer);
		
	}]);

	scotchApp.controller('contactController', function($scope) {
		$scope.message = 'Contact us! JK. This is just a demo.';
	});

	

	scotchApp.controller('mainController',['$scope','HeaderService',function($scope,HeaderService,$location) {
		 $scope.selected = '';
		 $scope.names = ["About", "Education", "Skills", "Hobbies", "Portfolio","Family","Friends"];

          $scope.sid=function()
		 {
		 	   alert("sid");
		 };

		 
		 $scope.parentObj=HeaderService.header1();
		 console.log($scope.parentObj.headerSearch+" "+$scope.parentObj.header2+"  "+$scope.parentObj.footer);
		 $scope.headerInput="Creative + HardWorking+ Innovative + Developer + Designer + Autodidactic";

		       $scope.routing=function()
		 {
		 	   var input=$('.si-input').val();
               $location.path(input.toLowerCase());
		 };

		 $scope.checkIfEnterKeyWasPressed = function($event){
    var keyCode = $event.which || $event.keyCode;
    if (keyCode === 13) {
        var input=$('.si-input').val();
               $location.path(input.toLowerCase());
    }

  };

$('[data-toggle="popover"]').popover();

$('body').on('click', function (e) {
    $('[data-toggle="popover"]').each(function () {
        //the 'is' for buttons that trigger popups
        //the 'has' for icons within a button that triggers a popup
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide');
        }
    });
});

		

	}]);


scotchApp.controller('homeController',['$scope','$controller',function($scope,$location,$controller){
	
	var testCtrl1ViewModel = $scope.$new(); 
   $controller('mainController',{$scope : testCtrl1ViewModel });
		testCtrl1ViewModel.myMethod();

		$scope.selected = '';
		 $scope.names = ["About", "Education", "Skills", "Hobbies", "Portfolio","Family","Friends"];
		 $scope.$on('myEvent',function(event,args){
		 	alert("hie");
		 	$scope.parentObj.headerSearch=args.headerSearch;

		 });
		 

    
	}]);
	scotchApp.run(['$rootScope', '$route', function($rootScope, $route) {
    $rootScope.$on('$routeChangeSuccess', function() {
        document.title = $route.current.title;
    });
    }]);

	scotchApp.directive('autoComplete', function($timeout) {
    return function(scope, iElement, iAttrs) {
            $(iElement).autocomplete({
            	 messages: {
        noResults: '',
        results: function() {}
    },
                source: scope[iAttrs.uiItems],

                select: function() {
                    $timeout(function() {
                      iElement.trigger('input');
                    }, 0);
                }
            });
    };
});

scotchApp.factory('HeaderService',function(){

         var headerOne={headerSearch:false,header2:false,footer:true};
         var headerTwo={headerSearch:true,header2:true,footer:false};
	return{
		header1:function()
		{
			return headerOne;
		},
		header2:function()
		{
			return headerTwo;
		}
	}
});

	