var skeletonId = 'skeleton';
var contentId = 'content';
var skipCounter = 0;
var takeAmount = 10;


function getRequests(mode) {
    // your code here...
}

function getMoreRequests(mode) {
    // Optional: Depends on how you handle the "Load more"-Functionality
    // your code here...
}

function getConnections() {
    // your code here...
}

function getMoreConnections() {
    // Optional: Depends on how you handle the "Load more"-Functionality
    // your code here...
}

function getConnectionsInCommon(userId, connectionId) {
    // your code here...
}

function getMoreConnectionsInCommon(userId, connectionId) {
    // Optional: Depends on how you handle the "Load more"-Functionality
    // your code here...
}

function getSuggestions() {
    // your code here...
    $.ajax({
        url: '/get-suggestions',
        type: 'GET',
        success: function(response) {

            var suggestionsHtml = '';
            response.forEach(function(suggestion) {
                suggestionsHtml += '<div class="my-2 shadow  text-white bg-dark p-1" id="suggestion_' + suggestion.id + '">' +
                    '<div class="d-flex justify-content-between">' +
                    '<table class="ms-1">' +
                    '<td class="align-middle">' + suggestion.name + '</td>' +
                    '<td class="align-middle"> - </td>' +
                    '<td class="align-middle">' + suggestion.email + '</td>' +
                    '</table>' +
                    '<div>' +
                    '<button id="create_request_btn_' + suggestion.id + '" class="btn btn-primary me-1" onclick="sendRequest(' + suggestion.id + ')">Connect</button>' +
                    '</div></div></div>';
            });

            $('#suggestions').html(suggestionsHtml);
        }
    });
}

function getMoreSuggestions() {
    // Optional: Depends on how you handle the "Load more"-Functionality
    // your code here...
}

function sendRequest(userId, suggestionId) {
    // your code here...
}

function deleteRequest(userId, requestId) {
    // your code here...
}

function acceptRequest(userId, requestId) {
    // your code here...
}

function removeConnection(userId, connectionId) {
    // your code here...
}

$(function() {
    //getSuggestions();
});


$(document).ready(function() {
    getSuggestions();
});