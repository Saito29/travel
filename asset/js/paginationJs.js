$('#pagination').pagination({
    dataSource: '/admin/app/controller/user.php?pageNumber=1&pageSize=5',
    locator: 'user',
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
    ajax: {
        beforeSend: function() {
            dataContainer.html('Loading data from Travel.com ...');
        }
    },
    callback: function(data, pagination) {
        var html = template(data);
        datacontainer.html(html);
    }
})