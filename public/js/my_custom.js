// Show Category Model with the data
function EditCategoryModelShow(id){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url     : 'edit-category',
        data    :{id:id},
        dataType: 'json',
        success : function(response){
            document.getElementById("edit-category").value =response['category'];
            document.getElementById("category-id").value =response['id'];
            $("#myModal").modal();
        }
    });
}
// Validation Check edit category from model
$("#edit_category_submit").click(function(){
    var edit_category=$('#edit-category').val();
    $(".error").html('');
    error=false;
    if(edit_category==""){
        $("#edit_category_error").append('Please enter category');
        error=true;
    }
    else{
        if(edit_category.length < 1 || edit_category.length > 15){
            $("#edit_category_error").append("Accepts min-max (1-15) characters.");
            error=true;
        }
    }
    if(error==false){
        return true
    }
    else{
        return false;
    }
});
//This function is used for delete the category
function DeleteCategory(id){
    var txt;
    var r = confirm("Are sure wann to delete this category");
    if (r == true) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url     : 'delete-category',
            data    :{id:id},
            dataType: 'json',
            success : function(response){
                if(response['status']){
                    location.reload();
                }
                else{
                    alert('Some Went Wrong');
                }
            }
        });
    }

}
//This function is used to delete the post
function DeletePost(id){
    var txt;
    var r = confirm("Are sure wann to delete this post");
    if (r == true) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url     : 'delete-post',
            data    :{id:id},
            dataType: 'json',
            success : function(response){
                if(response['status']){
                    location.reload();
                }
                else{
                    alert('Some Went Wrong');
                }
            }
        });
    }
}
function DeleteUser(id){
    var txt;
    var r = confirm("Are sure wann to delete this user");
    if (r == true) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url     : 'delete-user',
            data    :{id:id},
            dataType: 'json',
            success : function(response){
                if(response['status']){
                    location.reload();
                }
                else{
                    alert('Some Went Wrong');
                }
            }
        });
    }
}
//This function is used for open user view user mode in user session admin panel
function ViewUserModelOpen(id){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url     : 'view-user',
        data    :{id:id},
        dataType: 'json',
        success : function(response){
            document.getElementById("view-name").innerHTML =response['name'];
            document.getElementById("view-email").innerHTML =response['email'];
            document.getElementById("view-phone").innerHTML =response['phone'];
            $("#ViewModel").modal();
        }
    });
}
//This function is used for open open for edit the user.
function EditUserModelOpen(id){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url     : 'edit-user',
        data    :{id:id},
        dataType: 'json',
        success : function(response){
            document.getElementById('user-id').value=response['id'];
            document.getElementById("edit-name").value =response['name'];
            document.getElementById("edit-email").value =response['email'];
            document.getElementById("edit-phone").value =response['phone'];
            $("#EditUserModel").modal();
        }
    });
}