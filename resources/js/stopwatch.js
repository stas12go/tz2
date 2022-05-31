const visitedAt = Date.now();

const stopwatch = setInterval(() => {
    const millis = Date.now() - visitedAt;
    const span = document.getElementById('stopwatch');
    const elapsed = {};

    elapsed.hours = Math.floor(millis / 1000 / 60 / 60);
    elapsed.minutes = Math.floor(millis / 1000 / 60) - elapsed.hours * 60;
    elapsed.seconds = Math.floor(millis / 1000) - elapsed.minutes * 60;

    span.innerHTML = (elapsed.hours.toString().length < 2 ? '0' : '') + elapsed.hours + ':' + (elapsed.minutes.toString().length < 2 ? '0' : '') + elapsed.minutes + ':' + (elapsed.seconds.toString().length < 2 ? '0' : '') + elapsed.seconds + '.' + String(millis).slice(-3);
}, 55);

window.addEventListener('beforeunload', (event) => {
    const leftAt = Date.now();

    fetch('/stats/store', {
        method: 'PATCH', body: JSON.stringify({
            visitedAt: Math.floor(visitedAt / 1000), leftAt: Math.floor(leftAt / 1000)
        }), headers: {
            "Content-type": "application/json; charset=UTF-8", 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }).then(() => {
        clearInterval(stopwatch);
    });
});
