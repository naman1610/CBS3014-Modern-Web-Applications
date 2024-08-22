document.getElementById('age').addEventListener('input', updateFee);
document.getElementById('workshop').addEventListener('change', updateFee);
document.getElementById('registrationForm').addEventListener('submit', displayConfirmation);

function updateFee() {
    const age = parseInt(document.getElementById('age').value);
    const workshop = document.getElementById('workshop').value;
    let fee = 0;

    if (!isNaN(age)) {
        if (workshop === 'art') {
            fee = age < 14 ? 300 : 500;
        } else if (workshop === 'science') {
            fee = age < 14 ? 400 : 600;
        } else if (workshop === 'coding') {
            fee = age < 14 ? 350 : 550;
        } else if (workshop === 'music') {
            fee = age < 14 ? 250 : 450;
        }
    }

    document.getElementById('fee').textContent = `Workshop Fee: Rs.${fee}`;
}

function displayConfirmation(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const age = document.getElementById('age').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('contact').value;
    const workshop = document.getElementById('workshop').options[document.getElementById('workshop').selectedIndex].text;
    const feeText = document.getElementById('fee').textContent;

    const confirmationMessage = `
        <p>Thank you for registering, ${name}!</p>
        <p>Workshop: ${workshop}</p>
        <p>Age: ${age}</p>
        <p>Email: ${email}</p>
        <p>Phone: ${phone}</p>
        <p>${feeText}</p>
        <p>Please follow the payment instructions sent to your email.</p>
    `;

    document.getElementById('confirmationMessage').innerHTML = confirmationMessage;
    document.getElementById('confirmationMessage').style.display = 'block';
    document.getElementById('registrationForm').style.display = 'none';
}

document.getElementById('darkModeToggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    
    const modeIcon = document.getElementById('modeIcon');
    if (document.body.classList.contains('dark-mode')) {
        modeIcon.src = 'sun-icon.png'; // Replace with moon icon path
    } else {
        modeIcon.src = 'moon-icon.png'; // Replace with sun icon path
    }
});
