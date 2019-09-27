var app = angular.module('app',
        ['ngRoute', 'ngResource','ngMessages','app.controllers', 'app.services']);

angular.module('app.controllers', ['ngMessages']);
angular.module('app.services', ['ngResource']);

app.provider('appConfig', ['$httpParamSerializerProvider',
    function ()
    {
        var config = {
            baseUrl: 'http://cartaouro',
            baseUrlTpls: 'http://cartaouro/build/js/views/',
        };
        return {
            config: config,
            $get: function ()
            {
                return config;
            }
        };
    }]);
app.config(['$routeProvider', '$httpProvider', 'appConfigProvider', '$resourceProvider',
    function ($routeProvider, $httpProvider, appConfigProvider, $resourceProvider)
    {
        
     //   $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
   //     $httpProvider.defaults.headers.put['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
    //    $httpProvider.defaults.transformRequest = appConfigProvider.config.utils.transformRequest;
     //   $httpProvider.defaults.transformResponse = appConfigProvider.config.utils.transformResponse;
       $resourceProvider.defaults.stripTrailingSlashes = false;
       
    }]);
