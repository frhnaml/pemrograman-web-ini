// document.getElementById('nextBtn').addEventListener('click', function() {  
//     document.getElementById('imagescroll').scrollBy({  
//         top: 0,  
//         left: 300, // Sesuaikan dengan lebar gambar  
//         behavior: 'smooth'  
//     });  
// });  

// document.getElementById('prevBtn').addEventListener('click', function() {  
//     document.getElementById('imagescroll').scrollBy({  
//         top: 0,  
//         left: -300, // Sesuaikan dengan lebar gambar  
//         behavior: 'smooth'  
//     });  
// });


// Fungsi untuk menampilkan pesan jam operasional
function checkOperationalHours() {
    const now = new Date();  
    const currentDay = now.getDay();  
    const currentHour = now.getHours();  

    const statusElement = document.getElementById('operational-status');
    
    
    let openingHour, closingHour;

    if (currentDay === 1) {  
      statusElement.textContent = "We are closed today, reopen tomorrow at 8 am";
      return;  
    } else if (currentDay >= 2 && currentDay <= 5) {  
      openingHour = 8;
      closingHour = 22;
    } else if (currentDay === 6) {  
      openingHour = 10;
      closingHour = 22;
    } else {  
      statusElement.textContent = "We are closed today, reopen Tuesday at 8 am.";
      return;  
    }

 
    if (currentHour >= openingHour && currentHour < closingHour) {
      statusElement.textContent = "We're open now!";
    } else {
      statusElement.textContent = `We are closed, reopen tomorrow at ${openingHour} am`;
    }
  }

  
  checkOperationalHours();