var modTelemetrics = angular.module("telemetrics",['ngRoute']);

modTelemetrics.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/', {
                templateUrl: 'list.html',
                controller: 'listController'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);

modTelemetrics.controller("listController", function($scope, $http){
    var time_difference = new Date().getTimezoneOffset();
    devices_list = [];
    var promise = $http({
        'url':'http://localhost/FleetManagement/api.php/devices'
    });
    promise.success(function(list_data){
        angular.forEach(list_data, function(data){
            var mObj_latest_utc = moment(data.latest); // last signal sent in UTC
            var utc_time = mObj_latest_utc.format('LLL');
            data.utc_time = utc_time;

            var mObj_latest_local = mObj_latest_utc.add(time_difference, 'm'); // converting to local time
            var local_time = mObj_latest_local.format('LLL'); // formatting the local time to display
            data.local_time = local_time;

            this.push(data);
        },  devices_list);
        $scope.devices_list = devices_list;

    });
});