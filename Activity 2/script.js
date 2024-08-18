document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registrationForm');
    const confirmation = document.getElementById('confirmation');
    const confirmationDetails = document.getElementById('confirmationDetails');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (validateForm()) {
            displayConfirmation();
        }
    });

    function validateForm() {
        const firstName = document.getElementById('firstName').value.trim();
        const lastName = document.getElementById('lastName').value.trim();
        const birthDate = new Date(document.getElementById('birthDate').value);
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();

        if (!firstName || !lastName || !birthDate || !email || !phone) {
            alert('Please fill in all required fields.');
            return false;
        }

        if (!validateEmail(email)) {
            alert('Please enter a valid email address.');
            return false;
        }

        if (!validatePhone(phone)) {
            alert('Please enter a valid 10-digit phone number.');
            return false;
        }

        const age = calculateAge(birthDate);
        if (age < 5) {
            alert('The student must be at least 5 years old to register.');
            return false;
        }

        return true;
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function validatePhone(phone) {
        const re = /^\d{10}$/;
        return re.test(phone);
    }

    function calculateAge(birthDate) {
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    function displayConfirmation() {
        const firstName = document.getElementById('firstName').value.trim();
        const lastName = document.getElementById('lastName').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const session = document.querySelector('input[name="session"]:checked').value;

        let sessionCost;
        switch (session) {
            case 'Before School Care Only':
                sessionCost = 2000;
                break;
            case 'After School Care Only':
                sessionCost = 2500;
                break;
            case 'Before AND After School Care':
                sessionCost = 5000;
                break;
            case 'Drop-In Care':
                sessionCost = 4000;
                break;
        }

        const confirmationText = `
            Thank you for registering, ${firstName} ${lastName}!
            
            Session: ${session}
            Total Cost: Rs. ${sessionCost}
            Contact Number: ${phone}
        `;

        confirmationDetails.textContent = confirmationText;
        form.style.display = 'none';
        confirmation.classList.remove('hidden');
    }
});