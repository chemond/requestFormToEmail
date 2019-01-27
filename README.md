# requestFormToEmail
Add a button to your web page that brings you to a form then sends an email of the form values

# Details
This is a responsive design using CSS3 flex-box. The process flow is as follows:
* Click <strong>Request</strong> button on the <i>index.html</i> page
** This takes you to the <i>request_form.html</i> page
* Enter values for in form and click <strong>Submit</strong>
** This will process the <i>form-to-email.php</i> script
* <i>form-to-email.php</i> will take the values from the form and send an email to any email address from an email address set up on your SMTP server. After the script has processed, you are redirected to the <i>success.php<i> script which echos a success message and will redirect you to <i>index.html</i> after 5 seconds
