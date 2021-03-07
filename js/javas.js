$(function() {
    $("#form").on('click',function(e){
        e.preventDefault();
        $('html','body').animate({ scrollTop: 1000},800);
    });
});

$(function() {
    $("#footer").on('click',function(e){
        e.preventDefault();
        $('html','body').animate({ scrollTop: 0},800);
    });
});
