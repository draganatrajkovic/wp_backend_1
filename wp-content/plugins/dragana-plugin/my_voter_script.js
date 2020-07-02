function handleEditPost() {
   let userId = document.getElementById('user_id').value;
   let id = document.getElementById('id').value;
   let title = document.getElementById('title').value;
   let sub_title = document.getElementById('sub_title').value;
   
   const obj = {
      'id': id,
      'title' : title,
      'sub_title': sub_title,
      'action': "ajaxCallUpdate"
   }
   console.log(obj)

   $.ajax({
      url: myAjax.ajaxurl,
      type: 'POST',
      data: obj,
      success: function(respond){
         console.log('Respond: ' +  respond)
         window.location=document.location.href
      }, 
      error: function(error) {
         console.log(error)
      }
   });
}

function handleAddPost() {
   let userId = document.getElementById('user_id').value;
   let title = document.getElementById('new-title').value;
   let sub_title = document.getElementById('new-sub_title').value;
   let content = document.getElementById('new-content').value;
   
   const obj = {
      'title' : title,
      'sub_title' : sub_title,
      'content': content,
      'action': "ajaxCallAdd"
   }

   $.ajax({
      url: myAjax.ajaxurl,
      type: 'POST',
      data: obj,
      success: function(respond){
         window.location.href = 'http://' + window.location.hostname + '/projects/wp_backend_1/real-estate/' + title
      }, 
      error: function(error) {
         console.log(error)
      }
   });
}

function handleDeletePost() {
   let userId = document.getElementById('user_id').value;
   let id = document.getElementById('id').value;

   const obj = {
      'id': id,
      'action': "ajaxCallDelete"
   }

   $.ajax({
      url: myAjax.ajaxurl,
      type: 'POST',
      data: obj,
      success: function(respond){
         window.location.href = 'http://' + window.location.hostname + '/projects/wp_backend_1/real-estate/'
      }, 
      error: function(error) {
         console.log(error)
      }
   });
}