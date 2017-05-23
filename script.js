	// create the module and name it scotchApp
	var scotchApp = angular.module('scotchApp', ['ngRoute']);

	// configure our routes
	scotchApp.config(['$routeProvider',function($routeProvider) {
		$routeProvider

			// route for the home page
			.when('/home', {
				templateUrl : 'pages/home.html',
				controller  : 'mainController',
				title:'Siddhu Vydyabhushana\'s Creative Portfolio'
			})

			// route for the about page
			.when('/about', {
				templateUrl : 'pages/about.html',
				controller  : 'aboutController',
				title:'Full Stack Web Developer, Hyderabad | India'
			})

			// route for the contact page
			.when('/contact', {
				templateUrl : 'pages/contact.html',
				controller  : 'contactController',
				title:'Get in touch with Siddhu Vydyabhushana'
			})

			// route for the works page
			.when('/work', {
				templateUrl : 'pages/work.html',
				controller  : 'workController',
				title:'Portfolio of Siddhu Vydyabhushana'
			})

			// route for the images page
			.when('/images', {
				templateUrl : 'pages/images.html',
				controller  : 'imagesController',
				title:'Images of Siddhu Vydyabhushana'
			})

			// route for the images page
			.when('/skills', {
				templateUrl : 'pages/skills.html',
				controller  : 'skillsController',
				title:'Siddhu Vydyabhushana\'s Skills'
			})

			
			// route for the projects page
			.when('/projects', {
				templateUrl : 'pages/projects.html',
				controller  : 'projectsController',
				title:'Siddhu Vydyabhushana\'s projects'
			})

  
			.otherwise({
				redirectTo:'/about'
			});
	}]);

	
	scotchApp.controller('imagesController', function($scope) {
		$scope.message = 'Look! I am an about page.';
		$scope.parentObj.headerSearch=true;
		console.log($scope.parentObj.headerSearch);

	});

	scotchApp.controller('skillsController', function($scope,$rootScope) {
	});

	scotchApp.controller('aboutController',['$scope','HeaderService','menuService',function($scope,$rootScope,HeaderService) {
		 
		//console.log($scope.parentObj.headerSearch+" "+$scope.parentObj.header2+"  "+$scope.parentObj.footer);
		window.addEventListener('scroll',function(){
			  var pageOffset=window.pageYOffset;
			  var magic=document.getElementById('imp');
			  if(pageOffset>150){
				  	magic.className="imps";
			  }
		});
		
	}]);

	scotchApp.controller('contactController', function($scope,$route) {
	});

	scotchApp.controller('workController', function($scope,$route) {
	});

	scotchApp.controller('projects', function($scope,$route) {
	});

	scotchApp.controller('mainController',['$scope','HeaderService',function($scope,HeaderService,$location,menuService) {
		
			$scope.openNav=	 function () {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
};

$scope.closeNav=function () {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
		 $scope.selected = '';
	$scope.classVar="about";
	$scope.menu=function(menu){
			$scope.classVar=menu;
	};
		 $scope.names = ["About", "Education", "Skills", "Hobbies", "Portfolio","Family","Friends"];
		
		 $scope.headerInput="Creative + HardWorking+ Innovative + Developer + Designer + Autodidactic";

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
	window.ga('create', 'UA-49262632-1', 'auto');
    $rootScope.$on('$routeChangeSuccess', function() {
        document.title = $route.current.title;
		window.ga('send', 'pageview', location.pathname);
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

scotchApp.factory('menuService',function(){
	
  return {
	  setMenu:function(data){
		  menu=data;
	  },
	  getMenu:function(){
		  return menu;
	  }
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

	
