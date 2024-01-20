
      let courses = document.getElementById('courses');
      let courses_menu = document.getElementById('courses_menu');
      let i = 0;
      courses.addEventListener("mouseover", function(){
          
              courses.style.color="#ff2b01";
              courses_menu.style.display="block";
          
      })  
      courses_menu.addEventListener("mouseover", function(){
          
              courses.style.color="#ff2b01";
              courses_menu.style.display="block";
        })
      courses_menu.addEventListener("mouseout", function(){
          
        courses.style.color="black";
        courses_menu.style.display="none";
      
      })

     let course2 = document.getElementById("dropbtn");
      c = 0;

      course2.addEventListener("click", function(){
          let dropdown_content = document.querySelector(".dropdown-content");
          if(c == 1){
              c = 0;
              dropdown_content.style.display = "none";
          } else{
              c = 1;
              dropdown_content.style.display = "block";
          }
      })

    