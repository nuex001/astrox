const deletebtns = document.querySelectorAll("#delete");
  deletebtns.forEach(deletebtn => {
    deletebtn.addEventListener("click",deletes)
  });
   function deletes(e) {
       e.preventDefault();
       let id = e.target.getAttribute("data-index");
       div = e.target;
    Swal.fire({
        title:'Are you sure you want to delete',
        icon:'warning',
        showCancelButton:true,
        cancelButtonColor:'#d33',
        timer:5000
       }).then(response => {
        const isConfirmed = response.isConfirmed;
        if (isConfirmed) {
          xhr = new XMLHttpRequest();
          xhr.open('GET', 'api.php?userid=' + id, true);
    
          xhr.onload = function () {
            // console.log(this.responseText);
            if (this.responseText) {
              console.log(this.responseText);
              if (this.responseText == "successfull") {
                let parente = div.parentNode;
                let grandParent = parente.parentNode;
                let main = grandParent.parentNode;
                main.remove(); 
                Swal.fire({
                    title:'successfully Deleted',
                    icon:'success',
                    timer:5000
                   })
              }
            }
          }
          xhr.send();
          // console.log(id);
        }
    
      })
    
   }
//    for adding
const addbtns = document.querySelectorAll("#add");
  addbtns.forEach(addbtn => {
    addbtn.addEventListener("click",adds)
  });
   function adds(e) {
       e.preventDefault();
       let id = e.target.getAttribute("data-index");
       div = e.target;
    Swal.fire({
        title:'Are you sure you want to add this user',
        icon:'warning',
        showCancelButton:true,
        cancelButtonColor:'#d33',
        timer:5000
       }).then(response => {
        const isConfirmed = response.isConfirmed;
        if (isConfirmed) {
          xhr = new XMLHttpRequest();
          xhr.open('GET', 'api.php?addid=' + id, true);
    
          xhr.onload = function () {
            // console.log(this.responseText);
            if (this.responseText) {
              console.log(this.responseText);
              if (this.responseText == "successfull") {
                let parente = div.parentNode;
                let grandParent = parente.parentNode;
                let main = grandParent.parentNode;
                main.remove(); 
                Swal.fire({
                    title:'successfully added',
                    icon:'success',
                    timer:5000
                   })
              }else{
                Swal.fire({
                    title:'An error ocurred',
                    text: 'Try Again later',
                    icon:'warning',
                    timer:5000
                   })
              }
            }
          }
          xhr.send();
          // console.log(id);
        }
    
      })
    
   }