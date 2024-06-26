function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

let slideIndex = 1;

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].classList.add("hidden");
        slides[i].classList.remove("block");
    }
    slides[slideIndex-1].classList.add("block");
    slides[slideIndex-1].classList.remove("hidden");
}

function plusSlides(n) {
    showSlides(slideIndex += n);
}

document.addEventListener("DOMContentLoaded", function() {
    showSlides(slideIndex);
    document.querySelector(".prev").addEventListener("click", function() {
        plusSlides(-1);
    });
    document.querySelector(".next").addEventListener("click", function() {
        plusSlides(1);
    });

    setInterval(function() {
        plusSlides(1);
    }, 5000); // Change slide every 5 seconds

    // Example of concurrent AJAX requests
    let urls = [
        'https://api.example.com/data1',
        'https://api.example.com/data2',
        'https://api.example.com/data3'
    ];

    function fetchData(url) {
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', url);
            xhr.onload = () => {
                if (xhr.status === 200) {
                    resolve(xhr.responseText);
                } else {
                    reject(new Error(`Request failed with status ${xhr.status}`));
                }
            };
            xhr.send();
        });
    }

    Promise.all(urls.map(fetchData))
        .then(responses => {
            console.log('All data fetched:', responses);
            // Handle the responses
        })
        .catch(error => {
            console.error('One or more requests failed:', error);
        });
});
