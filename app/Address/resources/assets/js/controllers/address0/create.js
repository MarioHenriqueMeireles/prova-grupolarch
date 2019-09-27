app.controller('AddressCreateController',
        ['$scope', '$location', 'appConfig', 'Address',
            function ($scope, $location, appConfig, Address)
            {
                $scope.getFromCEP = function ()
                {
                    var cep = $scope.postal_code.replace(/-/g,'').replace(/\s/g,'');
                    Address.get({cep: cep});
                };
            }]);

