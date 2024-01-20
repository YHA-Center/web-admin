
// flipping the card
let turnon = document.getElementById('turnon');
let turnoff = document.getElementById('turnoff');
let flip = document.querySelector(".flip-card-inner");

turnon.addEventListener("click",function(){
    flip.style.transform = "rotateY(180deg)";
    document.querySelector('#welcome').innerHTML = "Welcome"
    
})
turnoff.addEventListener("click",function(){
    flip.style.transform = "rotateY(0deg)";
    document.querySelector('#welcome').innerHTML = "Welcome Back"
})

// show and hide password
var a = 1;
let show = document.querySelectorAll("#show");

for(let i = 0; i< show.length; i++){
show[i].innerHTML = `<i id="show1" class="fa-solid fa-eye"></i>`;
var a = 0;
show[i].addEventListener("click", function(){
    if(a == 0){
        show[i].innerHTML = `<i class="fa-solid fa-eye-slash"></i>`;
        let password = document.querySelectorAll("#password")
        password[i].type = 'text'; 
        a = 1;
    } else{
        show[i].innerHTML = `<i class="fa-solid fa-eye"></i>`;
        let password = document.querySelectorAll("#password")
        password[i].type = 'password'; 
        a = 0;
    }
    
    
} 
)
}

  
// // {{-- finding phone number --}}
// $.ajax({
//     url: '{{ route("signup.student_signup_process") }}',
//     method: 'POST',
//     data: {
//         phone_number: phoneNumber,
//         ph: $('#phoneNumber').val(),          // Replace with the actual phone number input value
//         nam: $('#userName').val(),            // Replace with the actual username input value
//         password: $('#password').val(),       // Replace with the actual password input value
//         cpassword: $('#cpassword').val(),     // Replace with the actual confirm password input value
//         _token: csrfToken
//     },
//     headers: {
//         'X-CSRF-TOKEN': csrfToken
//     },
//     success: function (response) {
//         if (response.status === 'success') {
//             // Handle success, if needed
//         } else {
//             // Handle failure, if needed
//         }
//     },
//     error: function (error) {
//         console.log('Error checking phone number:', error.responseText);
//     }
// });



// disable sign up button


