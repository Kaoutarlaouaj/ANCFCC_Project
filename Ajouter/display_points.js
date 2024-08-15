google.earth.createInstance('map', initCallback, failureCallback);

function initCallback(instance) {
    var placemarks = [];

    // Récupérer les données des points depuis la base de données MySQL
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_points.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var pointsData = JSON.parse(xhr.responseText);
            
            for (var i = 0; i < pointsData.length; i++) {
                
                var point = instance.createPlacemark('');
                var latitude = pointsData[i].lat;
                var longitude = pointsData[i].lng;
                point.setGeometry(instance.createPoint(''));
                point.getGeometry().setLatitude(latitude);
                point.getGeometry().setLongitude(longitude);
                placemarks.push(point);
            }

            for (var i = 0; i < placemarks.length; i++) {
                instance.getFeatures().appendChild(placemarks[i]);
            }
        }
    };
    xhr.send(null);
}

function failureCallback(errorCode) {
    // Traitement des erreurs
}
