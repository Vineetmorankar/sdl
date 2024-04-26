Install the mail Gem:
First, you need to install the mail gem if you haven't already. Open your terminal or command prompt and run:

sh
Copy code
gem install mail
Ruby Script (send_email.rb):
Here's a Ruby script that sends an email using the mail gem:

ruby
Copy code
require 'mail'

def send_email
  # Email configuration
  options = {
    address: 'smtp.gmail.com',
    port: 587,
    user_name: 'your_email@gmail.com',
    password: 'your_password',
    authentication: 'plain',
    enable_starttls_auto: true
  }

  Mail.defaults do
    delivery_method :smtp, options
  end

  # Email content
  mail = Mail.new do
    from    'your_email@gmail.com'
    to      'recipient_email@example.com'
    subject 'Test Email from Ruby Script'
    body    'Hello, this is a test email sent from a Ruby script.'
  end

  # Send the email
  mail.deliver!
  puts "Email sent successfully!"
rescue => e
  puts "Error sending email: #{e.message}"
end

# Call the send_email method to send the email
send_email


Instructions:
Replace 'your_email@gmail.com' with your Gmail address and 'your_password' with your Gmail password.
Replace 'recipient_email@example.com' with the recipient's email address.
Save the script to a file named send_email.rb.
Running the Script:
Open a terminal or command prompt.
Navigate to the directory where send_email.rb is saved.
Run the Ruby script by typing:
sh
Copy code
ruby send_email.rb