angular.module('app.services')
        .service('Address', ['$resource', 'appConfig','$filter',
            function ($resource, appConfig)
            {
              
                return $resource(appConfig.baseUrl + '/address',
                        {
                            id: "@id"
                        },
                        {
                            get: {
                                method: 'GET'
                            }
                        });
            }]);