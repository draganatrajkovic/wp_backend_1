
 function handleEditPost() {
   let id = document.getElementById('id').value;
   let title = document.getElementById('title').value;
   let sub_title = document.getElementById('sub_title').value;
   
   const obj = {
      'id': id,
      'title' : title,
      'sub_title': sub_title,
      'action': "ajaxCall"
   }
      console.log(obj)

      $.ajax({
         url: myAjax.ajaxurl,
         type: 'POST',
         data: obj,
         success: function(respond){
            console.log('Respond: ' +  respond)
      }, 
      error: function(error) {
         console.log(error)
      }
   });
}

function handleDeletePost() {
   let id = document.getElementById('id').value;
   alert(id)
   const obj = {
      'id': id,
      'action': "ajaxCallDelete"
   }
      $.ajax({
         url: myAjax.ajaxurl,
         type: 'POST',
         data: obj,
         success: function(respond){
            alert('s')
      }, 
      error: function(error) {
         console.log(error)
      }
   });
}

function handleAddPost() {
   // let id = document.getElementById('id').value;
   let title = document.getElementById('title').value;
   let sub_title = document.getElementById('sub_title').value;
   let content = document.getElementById('content').value;
   
   const obj = {
      'title' : title,
      'sub_title' : sub_title,
      'content': content,
      'action': "ajaxCallAdd"
   }
      alert(obj.content)

      $.ajax({
         url: myAjax.ajaxurl,
         type: 'POST',
         data: obj,
         success: function(respond){
            console.log('Respond: ' +  respond)
      }, 
      error: function(error) {
         console.log(error)
      }
   });
}