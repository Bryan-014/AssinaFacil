const TIME_OUT_DEF = 4

function timeOut(timeLeft) {
    document.querySelector('#down-alert').addEventListener('mouseover', () => {
        timeLeft = TIME_OUT_DEF;
    });
    setTimeout(() => {
        timeLeft -= 1;
        if (timeLeft == 0) {
            document.querySelector('#down-alert').classList.add('anim_dimis');
            setTimeout(() => {
                document.querySelector('#down-alert').classList.remove('show');
            }, 3000)
        }
        timeOut(timeLeft);
    }, timeLeft * 1000)
}

timeOut(TIME_OUT_DEF);