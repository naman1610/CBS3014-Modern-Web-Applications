document.getElementById('jobApplicationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const fullName = document.getElementById('fullName').value;
    const dateOfBirth = new Date(document.getElementById('dateOfBirth').value);
    const email = document.getElementById('email').value;
    const education = document.getElementById('education').value;
    const experience = parseInt(document.getElementById('experience').value);

    const today = new Date();
    const age = today.getFullYear() - dateOfBirth.getFullYear();
    const monthDiff = today.getMonth() - dateOfBirth.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dateOfBirth.getDate())) {
        age--;
    }

    const resultElement = document.getElementById('result');

    if (age < 21) {
        resultElement.innerHTML = '<p class="error">Sorry, you must be at least 21 years old to apply.</p>';
        return;
    }

    if (education !== 'bachelor' && education !== 'bachelor_related' && education !== 'master') {
        resultElement.innerHTML = '<p class="error">Sorry, you must have a bachelor\'s degree in computer science or a related field.</p>';
        return;
    }

    if (experience < 2) {
        resultElement.innerHTML = '<p class="error">Sorry, you must have at least 2 years of relevant work experience.</p>';
        return;
    }

    resultElement.innerHTML = '<p class="success">Congratulations! Your application has been submitted successfully.</p>';
    
    // Data to be sent to the server
    console.log('Form submitted:', { fullName, dateOfBirth, email, education, experience });
});