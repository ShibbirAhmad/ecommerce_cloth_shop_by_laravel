//alert for cofirming execution


$(document).ready(function(){
  
   $('.btnDelete').click(function(e){
 
      if (confirm('Are you Sure?')) {
          
          return true;
      }

       e.preventDefault();
   });
   
 });


 //to increment and decrement the input cart quantity

            let btnAdd=document.querySelector('#add');
            let btnSubtract=document.querySelector('#subtract');
            let input=document.querySelector('.cart_quantity_input');


            btnAdd.addEventListener('click', function()   {
            
               if (input.value < 10) {
                
                  input.value=parseInt(input.value) + 1;
               }
           

            } );



            btnSubtract.addEventListener('click', function ()  {
              
            if (input.value > 1) {

               input.value=parseInt(input.value) - 1;
            }
               

            } );

         
//this for disappear alert

setTimeout(removeAlert,5000)
function removeAlert(){

   document.querySelector('.alert').remove();
}