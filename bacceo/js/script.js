	// create the module and name it scotchApp
	var myApp = angular.module('siddhu', ['ngRoute', 'toastr']);

	// configure our routes
	myApp.config(function($routeProvider) {

		$routeProvider

			// route for the home page
			.when('/', {
				templateUrl : 'pages/mainContent.html',
				controller  : 'mainController'
			})

			// route for the Collections page
			.when('/collection', {
				templateUrl : 'pages/collection.html',
				controller  : 'collectionsController'
			}).

			// route for the single product page
			when('/product/:productId', {
				templateUrl : 'pages/product.html',
				controller  : 'productController'
			}).
			// route for the single product page
			when('/login', {
				templateUrl : 'pages/login.html',
				controller  : 'loginController'
			}).
			// route for the single product page
			when('/wishlist', {
				templateUrl : 'pages/wishlist.html',
				controller  : 'wishlistController'
			}).
			// route for the single product page
			when('/checkout', {
				templateUrl : 'pages/checkout.html',
				controller  : 'checkoutController'
			}).
			// route for the single product page
			when('/carousel', {
				templateUrl : 'pages/carousel.html',
				controller  : 'carouselController'
			});

	});
	myApp.directive('myComponent',function(toastr){
		return {
			restrict:'E',
			templateUrl:'pages/like.html',
			link:function(scope,element,attr){
				scope.sourcce="like.svg";
				 scope.alert=function(){
				 	if(attr.src=="like.svg"){
				 	scope.sourcce="like1.svg";	
				 	attr.src="like1.svg";
				 	toastr.success('Hello world!', 'Toastr fun!'); 	
				 	}
				 	else{
					attr.src="like.svg";
				 	scope.sourcce="like.svg";				
				 	toastr.error('Your credentials are gone', 'Error');
				 	}
				 //alert(attr.src.)
				 
				 }

			}
		}
	});
	myApp.directive('myDeleteComponent',function(toastr){
		return {
			restrict:'E',
			templateUrl:'pages/delete.html',
			link:function(scope,element,attr){
				scope.sourcce="delete.svg";
				 scope.alert=function(){
				 var itemJson=JSON.parse(attr.data);				 
				 }

			}
		}
	});

	// create the controller and inject Angular's $scope
	myApp.controller('mainController', function($scope,$http) {
		// create a message to display in our view

		$http.get('http://localhost/grawityapi/getting_menu.php').then(function(response)
		{
              $scope.supermenu=response.data.supermenu;
		});

		$scope.$on('$routeChangeStart', function() {
  $scope.isViewLoading = true;
});
$scope.$on('$routeChangeSuccess', function() {
  $scope.isViewLoading = false;
});
$scope.$on('$routeChangeError', function() {
  $scope.isViewLoading = false;
});

	});

	// create the controller and inject Angular's $scope
	myApp.controller('checkoutController', function($scope) {

		$scope.$on('$routeChangeStart', function() {
  $scope.isViewLoading = true;
});
$scope.$on('$routeChangeSuccess', function() {
  $scope.isViewLoading = false;
});
$scope.$on('$routeChangeError', function() {
  $scope.isViewLoading = false;
});

	});

	// create the controller and inject Angular's $scope
	myApp.controller('carouselController', function($scope) {

		$scope.$on('$routeChangeStart', function() {
  $scope.isViewLoading = true;
});
$scope.$on('$routeChangeSuccess', function() {
  $scope.isViewLoading = false;
});
$scope.$on('$routeChangeError', function() {
  $scope.isViewLoading = false;
});

	});

	// create the controller and inject Angular's $scope
	myApp.controller('loginController', function($scope,$http) {

		$scope.$on('$routeChangeStart', function() {
  $scope.isViewLoading = true;
});
$scope.$on('$routeChangeSuccess', function() {
  $scope.isViewLoading = false;
});
$scope.$on('$routeChangeError', function() {
  $scope.isViewLoading = false;
});

	});
	// create the controller and inject Angular's $scope
	myApp.controller('wishlistController', function($scope,$http) {
var self=this;
		$scope.collections=[
		{'id':1,'name':'Something 1', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':2,'name':'Something 2', 'price':'$50.00','url':'img/collection/men/2.png'},
		{'id':3,'name':'Something 3', 'price':'$50.00','url':'img/collection/men/3.png'},
		{'id':4,'name':'Something 4', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':5,'name':'Something 5', 'price':'$50.00','url':'img/collection/men/2.png'},
		{'id':6,'name':'Something 6', 'price':'$50.00','url':'img/collection/men/3.png'},
		{'id':7,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':8,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':9,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':10,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':11,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':12,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':13,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':14,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':15,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':16,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'}];

		$scope.$on('$routeChangeStart', function() {
  $scope.isViewLoading = true;
});
$scope.$on('$routeChangeSuccess', function() {
  $scope.isViewLoading = false;
});
$scope.$on('$routeChangeError', function() {
  $scope.isViewLoading = false;
});
$scope.delete=function(id){
	var index = $scope.collections.indexOf(id);
  $scope.collections.splice(index, 1);     
};

	});



	// create the controller and inject Angular's $scope
	myApp.controller('productController', function($scope,$routeParams) {
		// create a message to display in our view

		$scope.$on('$routeChangeStart', function() {
  $scope.isViewLoading = true;
});
$scope.$on('$routeChangeSuccess', function() {
  $scope.isViewLoading = false;
});
$scope.$on('$routeChangeError', function() {
  $scope.isViewLoading = false;
});

console.log($routeParams.productId);

	});

	myApp.controller('collectionsController',function($scope,toastr)
	{
		var self=this;
		$scope.collections=[
		{'id':1,'name':'Something 1', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':2,'name':'Something 2', 'price':'$50.00','url':'img/collection/men/2.png'},
		{'id':3,'name':'Something 3', 'price':'$50.00','url':'img/collection/men/3.png'},
		{'id':4,'name':'Something 4', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':5,'name':'Something 5', 'price':'$50.00','url':'img/collection/men/2.png'},
		{'id':6,'name':'Something 6', 'price':'$50.00','url':'img/collection/men/3.png'},
		{'id':7,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':8,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':9,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':10,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':11,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':12,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':13,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':14,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':15,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'},
		{'id':16,'name':'Something 7', 'price':'$50.00','url':'img/collection/men/1.png'}];



		$scope.$on('$routeChangeStart', function() {
  $scope.isViewLoading = true;
});
$scope.$on('$routeChangeSuccess', function() {
  $scope.isViewLoading = false;
});
$scope.$on('$routeChangeError', function() {
  $scope.isViewLoading = false;
});
		//Some Content
$(window).scroll(function(e)
{
var sticky=$('.header_filters'),scroll=$(window).scrollTop();

if(scroll>100) 
	sticky.addClass('fixedHeader');
else
	sticky.removeClass('fixedHeader');

});

 $('.pavan').hover(function()
 {
    $('.pavan ul').addClass('pavans');
 });

	});
