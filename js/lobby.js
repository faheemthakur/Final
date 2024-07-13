let forms = document.querySelectorAll('#lobby__form');

forms.forEach(form => {
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        sessionStorage.setItem('display_name', e.target.querySelector('input[name="name"]').value);

        let inviteCode = e.target.querySelector('input[name="room"]').value;
        if(!inviteCode){
            inviteCode = String(Math.floor(Math.random() * 10000));
        }
        window.location = `room.php?room=${inviteCode}`;
    });
});