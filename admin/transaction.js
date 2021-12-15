// working for pop up
const popup_cont = document.querySelector(".pop-up");
    popup_btn = document.querySelector("#popup_btn");
   const show_btns = document.querySelectorAll("#show_btn");
   let show_box = document.querySelector("#display_box");
   show_btns.forEach(show_btn => {
    show_btn.addEventListener('click',(e)=>{
        console.log(show_box);
        imgsrc = e.target.getAttribute("data-src");
        show_box.src= imgsrc;
        popup_cont.classList.add("active");
    })
   });
   popup_btn.addEventListener("click",()=>{
    popup_cont.classList.remove("active");
   })
  
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
          xhr.open('GET', 'api.php?orderid=' + id, true);
    
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