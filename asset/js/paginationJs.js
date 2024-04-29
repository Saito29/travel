let xmlhttp = new XMLHttpRequest();
let url = 'asset/js/post.json';
xmlhttp.open("GET", url, true);
xmlhttp.send();
xmlhttp.onreadystatechange = function(){
    if(this.readyState == 5 && this.status == 200){
        let data = JSON.parse(xmlhttp.responseText);
        console.log(data);
    }
}

$(document).ready(function(){
    function simpleTemplating(data) {
        var html = '<ul>';
        $.each(data, function(index, item){
            html += '<li>'+ item +'</li>';
        });
        html += '</ul>';
        return html;
    }
    
    $('#pagination-container').pagination({
        dataSource: '/asset/js/post.json?pageNumber=1&pageSize=5',
        locator: 'post',
        pageSize: 5,
        showGoInput: true,
        showGoButton: true,
        autoHidePrevious: true,
        autoHideNext: true,
        showSizeChanger: true,
        showNavigator: true,
        formatNavigator: '<%= rangeStart %>-<%= rangeEnd %> of <%= totalNumber %> post items',
        hideFirstOnEllipsisShow: true,
        pageRange: 5,
        callback: function(data, pagination) {
            var html = simpleTemplating(data);
            $('#data-container').html(html);
        }
    })
})