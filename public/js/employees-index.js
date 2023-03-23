$('#search').on('keyup', function() {
    var search = $('#search');
    event.preventDefault();
    $.ajax({
        url: '/search',
        type: 'GET',
        data: search.serialize(),
        success: function(data) {
            var searchResults = $('.searchResults');
            searchResults.empty();
            $.each(data, function(index, result) {
                if(authCheck== 'admin')
                searchResults.append('<tr><td>' + result['id'] + '</td><td>' + result['employeeID'] + '</td><td>' + result['first_name'] + '</td><td>' + result['last_name'] + '</td><td>' + result['start_date'] + '</td><td>' + result['skills'] + '</td><td>' + result['created_at'] + '</td><td>' + result['updated_at'] + '</td><td>' + result['created_by'] + '</td><td>' + result['updated_by'] +  '</td><td><a class="btn btn-info" href="' + window.location.origin + "/employees/show/" + result['id'] + '">View</a><a class="btn btn-primary" href="' + window.location.origin + "/employees/edit/" + result['id'] + '">Edit</a></td></tr>');
                 else
                    searchResults.append('<tr><td>' + result['id'] + '</td><td>' + result['employeeID'] + '</td><td>' + result['first_name'] + '</td><td>' + result['last_name'] + '</td><td>' + result['start_date'] + '</td><td>' + result['skills'] + '</td><td>' + result['created_at'] + '</td><td>' + result['updated_at']+ '</td><td>' + result['created_by'] + '</td><td>' + result['updated_by'] + '</td></tr>');
            });
        }
    });
});