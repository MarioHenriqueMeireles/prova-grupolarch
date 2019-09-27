app.controller('AddressCreateController',
        ['$scope', 'Address',
            function ($scope, Address)
            {
                $scope.address;/*{
                 postal_code: '',
                 city: '',
                 state:'',
                 coutry:'',
                 neighborhood: '',
                 public_place: ''
                 };*/
                $scope.getFromCEP = function ()
                {
                    $scope.terms = Address.query({cep: $scope.address.postal_code},function (data)
                    {
                        data.address.postal_code = $scope.address.postal_code;
                        $scope.address = data.address;
                     
                    }, function (data)
                    {
                        console.log(data.address);
                    });

                };
       
            }]);

