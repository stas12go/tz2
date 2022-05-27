const startTime = Date.now();

const stopwatch = setInterval(() => {
    const millis = Date.now() - startTime;
    const span = document.getElementById('stopwatch');
    const elapsed = {};
    elapsed.hours = Math.floor(millis / 1000 / 60 / 60);
    elapsed.minutes = Math.floor(millis / 1000 / 60) - elapsed.hours * 60;
    elapsed.seconds = Math.floor(millis / 1000) - elapsed.minutes * 60;

    span.innerHTML = (elapsed.hours.toString().length < 2 ? '0' : '') + elapsed.hours + ':' + (elapsed.minutes.toString().length < 2 ? '0' : '') + elapsed.minutes + ':' + (elapsed.seconds.toString().length < 2 ? '0' : '') + elapsed.seconds + '.' + String(millis).slice(-3);

    // expected output: seconds elapsed = 2
}, 55);

document.addEventListener('onunload', function () {
    clearInterval(stopwatch);
    alert('stopwatch cleared');
}, 5000)
