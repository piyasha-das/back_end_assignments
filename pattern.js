$(document).ready(function(){
    console.log('iuytgfdsghjk');
    $('.submit').click(function(){
        // alert("hello");
        check_pattern();
    });
    // check_pattern();
});
function check_pattern(){
    var pattern=/^[a-zA-Z]{1,}[|][0-9]{1,3}$/;
    var name=$('#textarea').val();
    var sp_name=name.split("\n");
    console.log(name);
    $.each(sp_name,function(index,value){
        if(!pattern.test(`${value}`)){
            alert("enter input in English|80 format");
            event.preventDefault();
            window.location.href="http://phpassignment.com/assignment3.php";
        }
    });
    // else {
    // window.location.href= "/submit_2.php";
    // }
    // else{
    //     $('#textarea_error_message').html("enter input in English|80 format");
    //     alert("enter input in English|80 format");
    // }
}
// $('#textarea').mouseleave(function(){
//     // check_pattern();
//     $(this).css("background-color","yellow");
// });