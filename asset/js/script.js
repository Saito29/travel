$(document).ready(function() {
    $(".menu-toggle").on("'click'", function(){
        $('.nav').toggleClass('showing');
        $('.nav ul').toggleClass('showing');
    });

    // Autoplay Post SliderShow Post
    $('.post-wrapper').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: $('.next'),
        prevArrow: $('.prev'),
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
    });
          /*Pagination JS*/
          $('#pagination').pagination({
            dataSource:['settings','slidetoshow','1','2','3','4'],
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
                    dataContainer.html('Loading data from Cube.io....');
                }
            },
            callback: function(data, pagination) {
                // template method of yourself
                var html = template(data);
                $('.data-container').html(html);
            }
        })
});

$('.alert').alert()

 //User image dropdown
 function toggleDropdown() {
  const dropdownContent = document.getElementById("dropdownContent");
  if (dropdownContent.style.display === "none") {
      dropdownContent.style.display = "block";
  } else {
      dropdownContent.style.display = "none";
  }};