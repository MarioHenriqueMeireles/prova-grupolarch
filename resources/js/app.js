/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import $ from 'jquery';
window.$ = window.jQuery = $;

$("#export-xls").click(function (event) {
    event.preventDefault();
    getXls();
});

var getXls = function () {
    const urlBase = window.location.protocol + '//' + window.location.hostname + ':' +  window.location.port;
    $.get(urlBase + '/api/customers' + window.location.search, function () { })
            .done(function(data){
                window.location = urlBase + '/api/customers' + window.location.search;
    });
}