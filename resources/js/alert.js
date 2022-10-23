$('#add_to_basket').click(function(){

    alert = $('.alert');
   
    alert.fadeIn();
    alert.css('right', '0');
    setTimeout(function(){
        alert.fadeOut(2000);
        alert.css('right', '-50%');
    }, 3000)
    

})