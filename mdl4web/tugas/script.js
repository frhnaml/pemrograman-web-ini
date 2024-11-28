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





  fetch('http://localhost/mdl4web/tugas/backend/dbconfig.php')
  .then(response => {
      if (!response.ok) {
          throw new Error('Network response was not ok');
      }
      return response.json(); 
  })
  .then(data => {
      const cardContainer = document.getElementById('ServiceCards'); 
      cardContainer.innerHTML = ''; 

      data.forEach(service => {
          
          const card = document.createElement('div');
          card.classList.add('card'); 

          
          card.innerHTML = `
              <img src="${service.img}" alt="${service.title}">
              <div class="card-body">
                  <h5>${service.title}</h5>
                  <p>${service.description}</p>
              </div>
          `;

          
          cardContainer.appendChild(card);
      });
  })
  .catch(error => console.error('Error fetching data:', error));


