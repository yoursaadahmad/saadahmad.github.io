from flask import Flask, request, jsonify
from flask_mail import Mail, Message

app = Flask(__name__)

# Configuration for Flask-Mail
app.config['MAIL_SERVER'] = 'smtp.gmail.com'  # Update with your SMTP server address
app.config['MAIL_PORT'] = 587  # Update with your SMTP server port
app.config['MAIL_USE_TLS'] = True
app.config['MAIL_USERNAME'] = 'mosesnuggz@gmail.com'  # Update with your Gmail address
app.config['MAIL_PASSWORD'] = 'jmlj dkuc kuah gnqa'  # Update with your Gmail password

mail = Mail(app)

@app.route('/submit_form', methods=['POST'])
def submit_form():
    data = request.form

    # Extract form data
    name = data.get('name')
    email = data.get('email')
    subject = data.get('subject')
    message = data.get('message')

    # Send email
    msg = Message(subject, sender=email, recipients=['contact@example.com'])  # Update with your receiving email address
    msg.body = f"From: {name}\nEmail: {email}\nMessage: {message}"
    try:
        mail.send(msg)
        return jsonify({'message': 'Email sent successfully!'}), 200
    except Exception as e:
        return jsonify({'error': f'Failed to send email: {str(e)}'}), 500

if __name__ == '__main__':
    app.run(debug=True)
