document.getElementById('loanForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const name = document.getElementById('name').value;
    const age = parseInt(document.getElementById('age').value);
    const annualIncome = parseFloat(document.getElementById('annualIncome').value);
    const creditScore = parseInt(document.getElementById('creditScore').value);
    const loanTerm = parseInt(document.getElementById('loanTerm').value);
    const interestRate = parseFloat(document.getElementById('interestRate').value);

    const monthlySalary = annualIncome / 12;
    const loanAmount = monthlySalary * 10;

    const isEligible = checkEligibility(age, annualIncome, creditScore, monthlySalary, loanAmount);
    const resultElement = document.getElementById('result');

    if (isEligible) {
        const emi = calculateEMI(loanAmount, interestRate, loanTerm);
        const emiPaymentCapacity = monthlySalary * 0.6;

        if (emi <= emiPaymentCapacity) {
            resultElement.innerHTML = `
                <p class="eligible">Congratulations, ${name}! You are eligible for the loan.</p>
                <p>Loan Amount: Rs. ${loanAmount.toFixed(2)}</p>
                <p>Monthly EMI: Rs. ${emi.toFixed(2)}</p>
                <a href="emi-details.html?name=${encodeURIComponent(name)}&loanAmount=${loanAmount}&interestRate=${interestRate}&loanTerm=${loanTerm}" target="_blank">View EMI Details</a>
            `;
        } else {
            resultElement.innerHTML = `
                <p class="not-eligible">Sorry, ${name}. Your EMI payment capacity is not sufficient for this loan amount.</p>
                <p>Maximum EMI Payment Capacity: Rs. ${emiPaymentCapacity.toFixed(2)}</p>
                <p>Required EMI: Rs. ${emi.toFixed(2)}</p>
            `;
        }
    } else {
        resultElement.innerHTML = `<p class="not-eligible">Sorry, ${name}. You are not eligible for the loan.</p>`;
    }
});

function checkEligibility(age, annualIncome, creditScore, monthlySalary, loanAmount) {
    return (
        age >= 18 &&
        age <= 65 &&
        annualIncome >= 20000 &&
        creditScore >= 700
    );
}

function calculateEMI(principal, interestRate, loanTerm) {
    const monthlyInterestRate = (interestRate / 100) / 12;
    const numberOfPayments = loanTerm * 12;
    const emi = (principal * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, numberOfPayments)) / (Math.pow(1 + monthlyInterestRate, numberOfPayments) - 1);
    return emi;
}