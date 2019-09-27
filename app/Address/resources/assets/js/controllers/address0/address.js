var app = angular.module('app',
        ['ngRoute', 'ngResource','app.controllers', 'app.services', 'app.directives', 'app.filters',
            "ui.bootstrap.tpls", 'angularUtils.directives.dirPagination',
            'ui.bootstrap']);

angular.module('app.controllers', ['ngMessages']);
angular.module('app.filters', []);
angular.module('app.directives', []);
angular.module('app.services', ['ngResource']);

app.provider('appConfig', ['$httpParamSerializerProvider',
    function ($httpParamSerializerProvider)
    {
        var config = {
            baseUrl: 'http://cartaouro',
            baseUrlTpls: 'http://cartaouro/build/js/views/',
            utils: {
                transformRequest: function (data)
                {
                    if (angular.isObject(data)) {
                        return $httpParamSerializerProvider.$get()(data);
                    }
                    return data;
                },
                transformResponse: function (data, headers)
                {
                    var headersGetter = headers();
                    if (headersGetter['content-type'] == 'application/json' ||
                            headersGetter['content-type'] == 'text/json') {
                        var dataJson = JSON.parse(data);
                        if (dataJson.hasOwnProperty('data') && Object.keys(dataJson).length == 1) {
                            dataJson = dataJson.data;
                        }
                        return dataJson;
                    }
                    return data;
                }
            }
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
        $routeProvider
                .when('/', {
                    controller: 'AddressCreateController'
                });
    }]);
app.run(function ($templateCache, appConfig)
{

});