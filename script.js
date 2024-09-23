// script.js
let currentImageIndex = 0;
let images = document.querySelectorAll('#imageSlider img');
let totalImages = images.length;

function changeImage() {
    images[currentImageIndex].classList.remove('showImage');
    currentImageIndex = (currentImageIndex + 1) % totalImages;
    images[currentImageIndex].classList.add('showImage');
}

setInterval(changeImage, 3000); // Change image every 3000 milliseconds
function fetchData() {
    var region = document.getElementById('region').value;
    var type = document.getElementById('type').value;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch.php?region=' + encodeURIComponent(region) + '&type=' + encodeURIComponent(type), true);
    xhr.onload = function() {
        if (this.status == 200) {
            try {
                var results = JSON.parse(this.responseText);
                var output = '';
                for (var i in results) {
                    output += '<p>' + results[i].name + '</p>';
                }
                document.getElementById('results').innerHTML = output;
            } catch (e) {
                console.error("Error parsing JSON!", e);
                document.getElementById('results').innerHTML = 'Error parsing JSON';
            }
        } else {
            document.getElementById('results').innerHTML = 'Error loading results';
        }
    };
    xhr.onerror = function() {
        document.getElementById('results').innerHTML = 'Request failed';
    };
    xhr.send();
}
