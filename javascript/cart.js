

function quit(){
//part



  var no1 = Number(document.getElementsByClassName('qut')[0].innerHTML);
  var amount1 = Number(document.getElementsByClassName('amount')[0].innerHTML);



document.getElementsByClassName('p_btn')[0].onclick = function(){
    no1 = no1+1;

    document.getElementsByClassName('qut')[0].innerHTML = no1;
    document.getElementsByClassName('sum')[0].innerHTML = amount1*no1;


  }
  document.getElementsByClassName('m_btn')[0].onclick = function(){
     no1 = no1-1;
    if(no1<1){
      no1 = 1;
    }


    document.getElementsByClassName('qut')[0].innerHTML = no1;
     document.getElementsByClassName('sum')[0].innerHTML = amount1*no1;

   }



   //part
     var no2 = Number(document.getElementsByClassName('qut')[1].innerHTML);
      var amount2 = Number(document.getElementsByClassName('amount')[1].innerHTML);


   document.getElementsByClassName('p_btn')[1].onclick = function(){
       no2 = no2+1;

       document.getElementsByClassName('qut')[1].innerHTML = no2;
       document.getElementsByClassName('sum')[1].innerHTML = amount2*no2;


     }
     document.getElementsByClassName('m_btn')[1].onclick = function(){
       no2 = no2-1;
       if(no2<1){
         no2 = 1;
       }


       document.getElementsByClassName('qut')[1].innerHTML = no2;
        document.getElementsByClassName('sum')[1].innerHTML = amount2*no2;

      }



      //part
        var no3 = Number(document.getElementsByClassName('qut')[2].innerHTML);
         var amount3 = Number(document.getElementsByClassName('amount')[2].innerHTML);


      document.getElementsByClassName('p_btn')[2].onclick = function(){
          no3 = no3+1;

          document.getElementsByClassName('qut')[2].innerHTML = no3;
          document.getElementsByClassName('sum')[2].innerHTML = amount3*no3;


        }
        document.getElementsByClassName('m_btn')[2].onclick = function(){
          no3 = no3-1;
          if(no3<1){
            no3 = 1;
          }


          document.getElementsByClassName('qut')[2].innerHTML = no3;
           document.getElementsByClassName('sum')[2].innerHTML = amount3*no3;

         }




      //    //part
           var no4 = Number(document.getElementsByClassName('qut')[3].innerHTML);
            var amount4 = Number(document.getElementsByClassName('amount')[3].innerHTML);


         document.getElementsByClassName('p_btn')[3].onclick = function(){
             no4 = no4+1;

             document.getElementsByClassName('qut')[3].innerHTML = no4;
             document.getElementsByClassName('sum')[3].innerHTML = amount4*no4;


           }
           document.getElementsByClassName('m_btn')[3].onclick = function(){
             no4 = no4-1;
             if(no4<1){
               no4 = 1;
             }


             document.getElementsByClassName('qut')[3].innerHTML = no4;
              document.getElementsByClassName('sum')[3].innerHTML = amount4*no4;

            }



        //part
              var no5 = Number(document.getElementsByClassName('qut')[4].innerHTML);
               var amount5 = Number(document.getElementsByClassName('amount')[4].innerHTML);


            document.getElementsByClassName('p_btn')[4].onclick = function(){
                no5 = no5+1;

                document.getElementsByClassName('qut')[4].innerHTML = no5;
                document.getElementsByClassName('sum')[4].innerHTML = amount5*no5;


              }
              document.getElementsByClassName('m_btn')[4].onclick = function(){
                no5 = no5-1;
                if(no5<1){
                  no5 = 1;
                }


                document.getElementsByClassName('qut')[4].innerHTML = no5;
                 document.getElementsByClassName('sum')[4].innerHTML = amount5*no5;

               }


  }
