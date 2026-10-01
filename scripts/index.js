$(document).ready(function () {
$("#search").submit(function (e) {
        console.log("SEARCH FORM SUBMITTED");

    e.preventDefault();
    let data = new FormData(this);
    

    $.ajax({
        url: "BACK/search.php",
        type: "POST",
        data: data,
        processData: false, 
        contentType: false,
          dataType: "json",
        success: function (data) {
              console.log("SEARCH RESPONSE:", data);
            show_students(data);
         },
        error: function (error) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: error['responseJSON']['message'],
            });
        }
    })
})})


