// loader 
const loader=document.getElementById("loader")
const body=document.getElementById("flexx")
const change=document.getElementById("change-color")
setTimeout(() => {
    loader.style.display = 'none'
  }, 1500);
  change.addEventListener ("click", ()=>{
    document.body.style.background = "green";
  })
 