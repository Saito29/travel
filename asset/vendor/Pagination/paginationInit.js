$(document).ready(function(){
    $('#pagination').pagination({
        dataSource: function(done){
            $.ajax({
                type: 'GET',
                url: './asset/js/post.json',
                success: function(response,){
                    done(response);
                }
        })},
        locator: 'posts',
        totalNumberLocator: function(response) {
            // you can return totalNumber by analyzing response content
            return Math.floor(Math.random() * (1000 - 100)) + 100;
        },
        pageSize: 5,
        showGoInput: true,
        showGoButton: true,
        autoHidePrevious: true,
        autoHideNext: true,
        showSizeChanger: true,
        showNavigator: true,
        hideFirstOnEllipsisShow: true,
        pageRange: 5,
        ajax: {
            beforeSend: function() {
                dataContainer.html('Loading data from flickr.com ...');
            }
        },
        callback: function(data, pagination) {
            var html = simpleTemplating(data);
            dataContainer.html(html);
        }
    })
});
  
function simpleTemplating(data) {
    var html = '<ul>';
    $.each(data, function(index, item){
        html += '<li>'+ item +'</li>';
    });
    html += '</ul>';
    return html;
}

/*
$('#pagination').pagination({
    dataSource: [1, 2, 3, 4, 5, 6, 7, 47],
    pageSize: 5,
    showGoInput: true,
    showGoButton: true,
    autoHidePrevious: true,
    autoHideNext: true,
    showSizeChanger: true,
    showNavigator: true,
    hideFirstOnEllipsisShow: true,
    pageRange: 1,
    totalNumber: 100,
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
  });*/