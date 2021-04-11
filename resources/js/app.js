require('./bootstrap');

window.horoscopePredict = function(year, month, day, score, zodiac) {
    axios.get('/api/predict', {
        params: {
          year: year,
          month: month,
          day: day,
          score: score,
          zodiac: zodiac
        }
    }).then(function (response) {
        
        document.getElementById("prediction").innerHTML = response.data.prediction;
        console.log(response);

    }).catch(function (error) {
        console.error(error);
    })
}