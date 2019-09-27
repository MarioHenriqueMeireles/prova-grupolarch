angular.module('app.services')
        .service('Address', ['$resource', 'appConfig', '$filter',
            function ($resource, appConfig)
            {

                return $resource(appConfig.baseUrl + '/address-fromcep/:cep',
                        {
                            cep: "@cep"
                        },
                        {
                            
                            query: {
                                method: 'GET',
                                isArray: false
                            }
                        });
            }]);