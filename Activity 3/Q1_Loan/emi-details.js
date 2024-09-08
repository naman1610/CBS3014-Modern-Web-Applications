document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const name = urlParams.get('name');
    const loanAmount = parseFloat(urlParams.get('loanAmount'));
    const interestRate = parseFloat(urlParams.get('interestRate'));
    const loanTerm = parseInt(urlParams.get('loanTerm'));

    const monthlyInterestRate = (interestRate / 100) / 12;
    const numberOfPayments = loanTerm * 12;
    const emi = calculateEMI(loanAmount, interestRate, loanTerm);

    document.getElementById('loanInfo').innerHTML = `
        <p><strong>Name:</strong> ${name}</p>
        <p><strong>Loan Amount:</strong> Rs. ${loanAmount.toFixed(2)}</p>
        <p><strong>Interest Rate:</strong> ${interestRate}%</p>
        <p><strong>Loan Term:</strong> ${loanTerm} years</p>
        <p><strong>Monthly EMI:</strong> Rs. ${emi.toFixed(2)}</p>
    `;

    const tableBody = document.querySelector('#emiTable tbody');
    let balance = loanAmount;

    for (let month = 1; month <= numberOfPayments; month++) {
        const interest = balance * monthlyInterestRate;
        const principal = emi - interest;
        balance -= principal;

        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${month}</td>
            <td>Rs. ${emi.toFixed(2)}</td>
            <td>Rs. ${interest.toFixed(2)}</td>
            <td>Rs. ${principal.toFixed(2)}</td>
            <td>Rs. ${Math.max(balance, 0).toFixed(2)}</td>
        `;
        tableBody.appendChild(row);
    }
});

function calculateEMI(principal, interestRate, loanTerm) {
    const monthlyInterestRate = (interestRate / 100) / 12;
    const numberOfPayments = loanTerm * 12;
    const emi = (principal * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, numberOfPayments)) / (Math.pow(1 + monthlyInterestRate, numberOfPayments) - 1);
    return emi;
}