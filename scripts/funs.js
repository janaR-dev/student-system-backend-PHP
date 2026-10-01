function delete_student(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "BACK/delete_student.php",
                type: "POST",
                data: { "student_id": id },
                dataType: "json",
                success: function (response) {
                    $(`tr[data-student-id="${id}"]`).remove();

                    if (typeof students !== 'undefined' && Array.isArray(students)) {
                        students = students.filter(item => item.id != id);
                    }

                    Swal.fire({
                        title: "Deleted!",
                        text: "Student has been deleted.",
                        icon: "success"
                    });
                },
                error: function (error) {
                    let errorMessage = error.responseJSON?.message || "Failed to delete student.";

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: errorMessage,
                    });
                }
            });
        }
    });
}

function show_students(students){
    $("tbody").html("");
    let tbody ='';
    for (let i = 0; i < students.length; i++) {

        let shortened_pass = students[i]['password'].slice(0, 15);
       tbody += `
       <tr data-student-id= '${students[i]['id']}'>
        <th>${students[i]['id']}</th>
                             <td>${students[i]["first_name"]}</td>
                             <td>${students[i]["last_name"]}</td>
                             <td>${students[i]["email"]}</td>
                             <td>${shortened_pass}</td>
                             <td>${students[i]["age"]}</td>
                             <td>${students[i]["phone"]}</td>
                             <td>
                                 <a href="editStudentPage.php?student_id=${students[i]['id']}" class="btn btn-info text-light me-2" >Edit</a>
                                 <button class="btn btn-danger" onclick="delete_student(${students[i]['id']})">Delete</button>
                             </td>
                         </tr>
       `
        
    }

        $("tbody").html(tbody);


}