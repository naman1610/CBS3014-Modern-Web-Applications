# Assessment-5 

Develop a PHP application to simulate a "Customer Feedback Management System" for an online store. The system should allow users to submit feedback, store it in a file, and include functionalities to search and analyze feedback data using file handling, date and timestamp, and string manipulation built-in methods. 

1. **Create a feedback submission form**: 
- Create an HTML form where customers can submit feedback. The form should include fields for: 
  - Name 
  - Email 
  - Feedback Message 
- On form submission, write the feedback to a file (feedback.txt), including the customer's  name,  email,  feedback  message,  and  the  current  date  and timestamp. 
2. **Store the feedback with the following format in feedback.txt**: 

Date: YYYY-MM-DD HH:MM:SS Name: Customer Name 

Email: customer@example.com Message: Feedback message goes here.

3. **Implement the following functionalities**: 
- **Search feedback by name or keyword**: 
  - Allow users to search for feedback by a specific name or keyword. 
  - Display matching feedback entries with their timestamps.
- **Count and display word occurrences**: 
- Display the frequency count of specific words across all feedback entries (e.g., words  like  "great,"  "good,"  "poor,"  etc.).  Use  string  built-in  methods  for  counting occurrences  
4. **Display and Output**: 
- Display feedback results in an HTML table, showing: 
- Feedback Date 
- Customer Name 
- Email 
- Feedback Message 
