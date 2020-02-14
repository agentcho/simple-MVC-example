
    this.getUser = function(userId){
       $.ajax({
           url: "/index.php?route=admin/getUser",
           type: "POST",
           data: "id="+userId,
           dataType: "text",
           error: function(xhr,str){
               this.printAjaxErrorMessage(xhr,str); 
           },
           success:function(response){
               // console.log(response); 
               var responseData = JSON.parse(response);
               if(responseData.message === "success"){
                  
                  $("#editUserModal #username").val(responseData.data.username); 
                  $("#editUserModal #password").val(responseData.data.password); 
                  $("#editUserModal #firstname").val(responseData.data.firstname); 
                  $("#editUserModal #lastname").val(responseData.data.lastname); 
                  $("#editUserModal #email").val(responseData.data.email); 
                  $("#editUserModal #phone").val(responseData.data.phone); 
                  $("#editUserModal #groupid").val(responseData.data.groupid); 
                  $("#editUserModal #userid").val(responseData.data.id); 
               }
           }
       }); 
       
       $("#editUserModal").modal();
    }
    
    this.addUser = function(formId){
        var formData = $("#"+formId).serialize(); 
        
        $.ajax({
            url : "/index.php?route=admin/add",
            type: "POST",
            data: formData,
            dataType: "text",
            error: function(xhr,str){
                this.printAjaxErrorMessage(xhr,str); 
            },
            success: function(response){
                var responseData = JSON.parse(response);
                
                if(responseData.message === "success"){
                    location.reload(); 
                }
            }
        });
    }
    
    this.editUser = function(formId){
        var formData = $("#"+formId).serialize(); 
        
        $.ajax({
            url : "/index.php?route=admin/edit",
            type: "POST",
            data: formData,
            dataType: "text",
            error: function(xhr,str){
                this.printAjaxErrorMessage(xhr,str); 
            },
            success: function(response){
                var responseData = JSON.parse(response);
                
                if(responseData.message === "success"){
                    location.reload(); 
                }
            }
        });
    }
    
    this.removeUser = function(userId){
        $.ajax({
            url : "/index.php?route=admin/remove",
            type: "POST",
            data: "id="+userId,
            dataType: "text",
            error: function(xhr,str){
                this.printAjaxErrorMessage(xhr,str); 
            },
            success: function(response){
                
                var responseData = JSON.parse(response);
                
                if(responseData.message === "success"){
                    location.reload(); 
                }
            }
        });
    }
    
    this.printAjaxErrorMessage = function(xhr,str){
        
    }
    